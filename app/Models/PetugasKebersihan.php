<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasKebersihan extends Model
{
    protected $table = 'petugas_kebersihan';
    use HasFactory;
    protected $fillable = [
        'username_petugas',
        'password_petugas',
        'id_administrator',
        'id_truk',
    ];

    public function dataDiriPetugas()
    {
        return $this->hasOne(DataDiriPetugas::class);
    }

    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }

    public function kendaraanPengangkutSampah()
    {
        return $this->belongsTo(KendaraanPengangkutSampah::class);
    }
}
