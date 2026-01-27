<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $guarded = [
        'id'
    ];
    public function uang_masuk()
    {
        return $this->hasMany(Uang_masuk::class);
    }
    public function uang_keluar()
    {
        return $this->hasMany(Uang_keluar::class);
    }
}
