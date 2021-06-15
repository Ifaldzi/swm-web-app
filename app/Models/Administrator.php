<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable as Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Administrator extends Authenticatable
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
