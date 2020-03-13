<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bulanan extends Model
{
    protected $table = 'bulanans';
    protected $fillable = ['nama', 'tgl','nilai', 'keterangan', 'nota'];
}
