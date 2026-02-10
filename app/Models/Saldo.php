<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Saldo extends Model
{
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function uang_masuk()
    {
        return $this->hasMany(Uang_masuk::class);
    }
    public function uang_keluar()
    {
        return $this->hasMany(Uang_keluar::class);
    }
}
