<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = 'administrator';
    use HasFactory;
    protected $fillable = [
        'username',
        'password',
    ];

    public function petugasKebersihan()
    {
        return $this->hasMany(PetugasKebersihan::class);
    }

    public function tempatSampah()
    {
        return $this->hasMany(TempatSampah::class);
    }
}
