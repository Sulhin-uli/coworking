<?php

namespace App\Http\Controllers;

use App\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        return view('riwayat.index');
    }

    public function index_single()
    {
        return view('riwayat.index_single');
    }

    public function list_data()
    {
        $riwayats = Riwayat::orderBy('id', 'DESC')->get();
        return view('riwayat.list_data')->with([
            'riwayats' => $riwayats
        ]);
    }

    public function list_data_single()
    {
        $riwayats = Riwayat::where('id_pelanggan', auth()->user()->id )->get();
        return view('riwayat.list_data')->with([
            'riwayats' => $riwayats
        ]);
    }

    public function hapus($id)
    {
        $data = Riwayat::findOrfail($id);
        $data->delete();
    }
}
