<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = "riwayats";
    // protected $primaryKey = 'nik';
    public $timestamp = true;
    protected $fillable = ['nik', 'nama','alamat','no_telp','detail_tempat', 'harga','tanggal_pemesanan', 'id_pelanggan'];
}
