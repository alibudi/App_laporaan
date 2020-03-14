<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    protected $table = 'pemesanans';
    protected $fillable = ['nomor', 'alamat','status', 'produk','keterangan', 'jumlah', 'harga'];
}
