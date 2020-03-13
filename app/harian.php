<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class harian extends Model
{
    protected $table = 'harians';
    protected $fillable = ['nama', 'tgl','nilai', 'keterangan', 'nota'];
}
