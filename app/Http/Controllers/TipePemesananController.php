<?php

namespace App\Http\Controllers;

use App\TipePemesanan;
use Illuminate\Http\Request;

class TipePemesananController extends Controller
{
    public function index()
    {
        return view('pemesanan.index');
    }

    public function save(Request $request)
    {
        $data = array(
            'kode_tipe'           => $request->kode_tipe,
            'nama_tipe'           => $request->nama_tipe,
            'harga'               => $request->harga,
            'fasilitas'           => $request->fasilitas,
            'gambar_tempat'       => $request->gambar_tempat,
        );
        TipePemesanan::insert($data);
    }

    public function list_data()
    {
        $pemesanans = TipePemesanan::orderBy('id', 'ASC')->get();
        return view('pemesanan.list_data')->with([
            'pemesanans' => $pemesanans
        ]);
    }

    public function hapus($id)
    {
        $data = TipePemesanan::findOrfail($id);
        $data->delete();
    }

    public function edit($id)
    {
        $data = TipePemesanan::where('id', $id)->first();
        return $data;
    }

    public function submit_edit(Request $request, $id)
    {
        $data = TipePemesanan::findOrfail($id);
        $data->kode_tipe = $request->kode_tipe;
        $data->nama_tipe = $request->nama_tipe;
        $data->harga = $request->harga;
        $data->fasilitas = $request->fasilitas;
        $data->gambar_tempat = $request->gambar_tempat;
        $data->save();
    }
}
