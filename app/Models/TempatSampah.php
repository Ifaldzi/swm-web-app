<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatSampah extends Model
{
    protected $table = 'tempat_sampah';

    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'device_name',
        'volume_tempat_sampah',
        'tinggi_tempat_sampah',
        'id_truk',
        'id_administrator'
    ];

    public function logPengambilanSampah()
    {
        return $this->hasMany(LogPengambilanSampah::class);
    }

    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }

    public function kendaraanPengangkutSampah()
    {
        return $this->belongsTo(KendaraanPengangkutSampah::class);
    }

    public function lokasi()
    {
        return $this->hasOne(Lokasi::class, 'id_tempat_sampah');
    }

    public function calculateVolume()
    {
        $applicationName = "SmartWaste";
        $deviceName = $this->device_name;
        $key = env('ANTARES_KEY');

        $header = array(
            "X-M2M-Origin: {$key}",
            "Content-Type: application/json;ty=4",
            "Accept: application/json"
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/".$applicationName."/".$deviceName."/la",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => $header,
        ));

        $response = curl_exec($curl);

        if ($response === false)
                $response = curl_error($curl);

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if($httpCode != "404") {
            //CONVERT to array
            $raw = json_decode('['.$response.']', true);

            //REMOVE header
            $temp_url = $raw[0]["m2m:cin"]["con"];
            $JSON = json_decode('['.$temp_url.']',true);
            curl_close($curl);
            $distance = $JSON[0]['distance'];//-> Array
        }else{
            // echo "ERROR[002] : Application Name or Device Name is Wrong";
            curl_close($curl);
            return collect(['code' => $httpCode, 'status' => 'ERROR[002] : Application Name or Device Name is Wrong']);
        }

        $binTall = $this->tinggi_tempat_sampah;
        $volume = (($binTall - $distance)/$binTall) * 100;
        $formatedVolume = number_format($volume, 2);
        return collect(['code' => $httpCode, 'volume' => $formatedVolume]);
    }
}
