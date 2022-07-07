<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "beritas";
    public $timestamps = true;

    protected $fillable = [
        'judul', 'isi'
    ];
}
