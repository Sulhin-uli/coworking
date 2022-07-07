<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PelangganModel extends Model
{
    protected $table = "pelanggans";
    // protected $primaryKey = 'nik';
    public $timestamp = true;
    protected $fillable = ['nik', 'nama','alamat','no_telp','detail_tempat', 'harga','tanggal_pemesanan', 'id_pelanggan'];
    
    static function get_all(){
        $data = DB::table('pelanggans')->get();
        return $data;
    }
    // static function product_get_by_id($id){
    //     $data = DB::table("pelanggans")->where('nik',$nik)->get();
    //     return $data;
    // }
    static function product_delete_by_id($id){
        $delete = DB::DELETE("DELETE FROM pelanggans WHERE nik ='".$nik."' ");
        return $delete;
    }
}
