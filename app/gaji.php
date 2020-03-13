<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gaji extends Model
{
    protected $table = 'gajis';
    protected $fillable = ['nik','nama', 'alamat','gaji', 'insentif', 'bonus', 'total'];
}
