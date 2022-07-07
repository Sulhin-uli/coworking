<?php

namespace App\Http\Controllers;

use App\PelangganModel;
use App\TipePemesanan;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelanggan.pelanggan_tambah');
    }
    
    // Menamplkan PElanggan Pesan
    public function usershow()
    {
        $pelanggan = PelangganModel::get_all();
        return view('pelanggan.pelanggan_show', compact('pelanggan'));
    }
    public function pelanggantampilan()
    {
        // return view('tampilan_pelanggan');
        $pemesanans = TipePemesanan::orderBy('id', 'ASC')->get();

        return view('tampilan_pelanggan')->with([
            'pemesanans' => $pemesanans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.pelangga_add');
    }

     public function usersave(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'detail_tempat' => 'required',
            'tanggal_pemesanan' => 'required',
        ]);
        // check tanggal apakah sudah ada
        $tgl_pemesanan = PelangganModel::where('tanggal_pemesanan', '=', $request->tanggal_pemesanan)->first();
        if ($tgl_pemesanan === null) {
            // Cetak Struck
            PelangganModel::create($request->all());
            $pelanggan = PelangganModel::orderBy('created_at', 'desc')->first();
            return view('pelanggan.pelanggan_print_show', compact('pelanggan'));

        } else {
            return redirect('/pelanggan/pesan')->with('success','Tanggal Pemesanan Sudah ada');
        }
  
        
    }

    public function userupdate(Request $request ){
        $add = Pelanggan::where('nik',$request->get('nik'))->FirstOrFail(); 
        
        $add->nik = $request->get('nik');
        $add->nama = $request->get('nama');
        $add->alamat = $request->get('alamat');
        $add->no_telp = $request->get('no_telp');
        $add->detail_tempat = $request->get('detail_tempat');
        $add->tanggal_pemesanan = $request->get('tanggal_pemesanan');
        $result = $add->save();

        if($result){
            return json_encode(array('msg'=>'Simpan Data Berhasil', 'content'=>$result, 'success'=>TRUE));
       }else{
            return json_encode(array('msg'=>'Gagal Menyimpan Data', 'content'=>$result, 'success'=>FALSE));
       } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PelangganModel  $pelangganModel
     * @return \Illuminate\Http\Response
     */
    public function show(PelangganModel $pelangganModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PelangganModel  $pelangganModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PelangganModel $pelangganModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PelangganModel  $pelangganModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PelangganModel $pelangganModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PelangganModel  $pelangganModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PelangganModel $pelangganModel)
    {
        //
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    // buat print laporan perbulan
    public function print_month(Request $request)
    {
        $time=strtotime($request->tanggal_pemesanan);
        $date = $request->tanggal_pemesanan;
        $month = date('m', strtotime($date));
        $year = date("Y",$time);
        $pelanggan = PelangganModel::whereMonth('tanggal_pemesanan',  $month)->whereYear('tanggal_pemesanan', $year)->get();
        return view('pelanggan.pelanggan_print', compact('pelanggan'));
    }
}
