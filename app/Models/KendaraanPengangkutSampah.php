<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanPengangkutSampah extends Model
{
    protected $table = 'kendaraan_pengangkut_sampah';
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'device_name',
        'kapasitas_pengangkut_sampah',
    ];

    public function petugasKebersihan()
    {
        return $this->hasMany(PetugasKebersihan::class);
    }

    public function logPengambilanSampah()
    {
        return $this->hasMany(LogPengambilanSampah::class);
    }

    public function tempatSampah()
    {
        return $this->hasMany(TempatSampah::class);
    }
}
