<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipePemesanan extends Model
{
    protected $table = "tipe_pemesanans";
    
    protected $fillable = [
        'kode_tipe', 'nama_tipe', 'harga', 'fasilitas', 'gambar_tempat'
    ];
}
