@extends('layouts.app')
@section('content')
   
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pemesanan Tempat</h2>
        </div>
        <div class="pull-right">
            {{-- <a class="btn btn-success" href="/pelanggan/show"> Lihat Data Pemesanan</a> --}}
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <p>{{ $message }}</p>   
            </div>
        @endif
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ url('pelanggan/save') }}" method="POST">
    @csrf
  
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nik</strong>
                            <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama:</strong>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Alamat:</strong>
                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>No_Telp:</strong>
                            <input type="number" name="no_telp" class="form-control" placeholder="Masukkan No Telp">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Detail_Tempat:</strong>
                            <select class="custom-select" name="detail_tempat" id="inputGroupSelect01">
                                <option selected>Pilih Tipe Tempat</option>
                                <option value="EKONOMI - Rp.3.000.000">EKONOMI - Rp.3.000.000</option>
                                <option value="BISNIS - Rp.5.000.000">BISNIS - Rp.5.000.000</option>
                                <option value="EKSEKUTIF - Rp.8.000.000">EKSEKUTIF - Rp.8.000.000</option>
                              </select>
                            {{-- <input type="text" name="detail_tempat" class="form-control" placeholder="Name"> --}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tanggal_Pemesanan:</strong>
                            <input type="date" name="tanggal_pemesanan" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/pelanggan/tampilan" type="submit" class="btn btn-warning">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('content')