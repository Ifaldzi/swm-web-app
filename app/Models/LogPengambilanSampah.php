<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPengambilanSampah extends Model
{
    protected $table = 'log_pengambilan_sampah';
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'waktu_penuh',
        'waktu_pengambilan'
    ];

    public function kendaraanPengangkutSampah()
    {
        return $this->belongsTo(KendaraanPengangkutSampah::class);
    }

    public function tempatSampah()
    {
        return $this->belongsTo(TempatSampah::class);
    }
}
