<?php

namespace App\Http\Controllers;

use App\PelangganModel;
use App\Riwayat;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index');
    }

    public function form()
    {
        return view('transaksi.form');
    }

    public function detail_transaksi()
    {
        return view('transaksi.index_detail');
    }

    public function save(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'detail_tempat' => 'required',
            'tanggal_pemesanan' => 'required',
        ]);

        // PelangganModel::create($request->all());

        // check tanggal apakah sudah ada
        $tgl_pemesanan = PelangganModel::where('tanggal_pemesanan', '=', $request->tanggal_pemesanan)->first();
        if ($tgl_pemesanan === null) {
            // PelangganModel::create($request->all());
            PelangganModel::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'detail_tempat' => $request->detail_tempat,
                'harga' => $request->harga,
                'tanggal_pemesanan' => $request->tanggal_pemesanan,
                'id_pelanggan' => $request->id_pelanggan
            ]);

            Riwayat::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'detail_tempat' => $request->detail_tempat,
                'harga' => $request->harga,
                'tanggal_pemesanan' => $request->tanggal_pemesanan,
                'id_pelanggan' => $request->id_pelanggan
            ]);
            // Riwayat::create($request->all());
            return redirect('/detail_transaksi')->with('success','Pemesanan Berhasil');

            // $pelanggan = PelangganModel::orderBy('created_at', 'desc')->first();
            // return view('pelanggan.pelanggan_print_show', compact('pelanggan'));

        } else {
            return redirect('/form')->with('fail','Tanggal Pemesanan Sudah ada');
        }
  
        
    }

    public function list_data()
    {
        $transaksis = PelangganModel::orderBy('id', 'DESC')->get();
        return view('transaksi.list_data')->with([
            'transaksis' => $transaksis
        ]);
    }

    public function list_data_detail()
    {
        $transaksis = PelangganModel::orderBy('id', 'DESC')->first();
        return view('transaksi.list_data_detail')->with([
            'transaksis' => $transaksis
        ]);
    }

    public function hapus($id)
    {
        $data = PelangganModel::findOrfail($id);
        $data->delete();
    }

    public function struk($id)
    {
        $pelanggan = Riwayat::where('id', $id)->first();
        return view('pelanggan.pelanggan_print_show', compact('pelanggan'));
    }
}
