<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatSampah extends Model
{
    protected $table = 'tempat_sampah';
    use HasFactory;
    protected $fillable = [
        'device_name',
        'volume_tempat_sampah',
        'tinggi_tempat_sampah',
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
        return $this->hasOne(Lokasi::class);
    }
}
