<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uang_keluar extends Model
{
    protected $guarded = [
        'id'
    ];

    public function saldo()
    {
        return $this->belongsTo(Saldo::class);
    }
}
