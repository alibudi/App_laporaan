<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class saldo extends Model
{
    protected $table= 'saldos';
    protected $guard = [];

    protected $fillable = [
        'saldo'
    ];

}
