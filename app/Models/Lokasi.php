<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    use HasFactory;
    protected $fillable = [
        'alamat',
        'longitude',
        'latitude',
    ];

    public function tempatSampah()
    {
        return $this->belongsTo(TempatSampah::class);
    }

}
