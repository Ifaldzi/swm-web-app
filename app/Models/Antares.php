<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antares extends Model
{
    protected $table = 'antares';
    use HasFactory;
    protected $fillable = [
        'nama_perangkat_antares'
    ];

    public function tempatSampah()
    {
        return $this->hasOne(TempatSampah::class);
    }

    public function kendaraanPengangkutSampah()
    {
        return $this->hasOne(KendaraanPengangkutSampah::class);
    }
}
