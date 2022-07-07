<?php

namespace App\Http\Controllers;

use App\Berita;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function all()
    {
        $beritas = Berita::orderBy('id', 'ASC')->get();
        return view('berita.berita')->with([
            'beritas' => $beritas
        ]);
    }

    public function index()
    {
        return view('berita.index');
    }

    public function save(Request $request)
    {
        $data = array(
            'judul'           => $request->judul,
            'isi'           => $request->isi,
            'created_at' => Carbon::now()
        );
        Berita::insert($data);
    }

    public function list_data()
    {
        $beritas = Berita::orderBy('id', 'ASC')->get();
        return view('berita.list_data')->with([
            'beritas' => $beritas
        ]);
    }

    
    public function hapus($id)
    {
        $data = Berita::findOrfail($id);
        $data->delete();
    }

    public function edit($id)
    {
        $data = Berita::where('id', $id)->first();
        return $data;
    }

    public function submit_edit(Request $request, $id)
    {
        $data = Berita::findOrfail($id);
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->save();
    } 
}
