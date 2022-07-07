<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PelangganModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $pelanggan = PelangganModel::get_all();
        // return view('pelanggan.pelanggan_show', compact('pelanggan'));
        return view('home');
    }
}
