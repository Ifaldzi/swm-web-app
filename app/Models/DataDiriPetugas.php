<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiriPetugas extends Model
{
    protected $table = 'data_diri_petugas';
    use HasFactory;
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'no_telp',
        'alamat',
    ];

    public function petugasKebersihan()
    {
        return $this->belongsTo(PetugasKebersihan::class);
    }
}
