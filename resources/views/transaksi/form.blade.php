<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<main>
  <div class="container-fluid px-4">
      {{-- <h1 class="mt-4">Form</h1> --}}
      <ol class="mt-4 breadcrumb mb-4">
          <li class="mt-4 breadcrumb-item active"><h4>Pemesanan</h4></li>
      </ol>
        <form action="{{ url('transaksi_save') }}" method="POST">
        @csrf
        
            <div class="card">
                <div class="mt-2 col-12">
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
                        <select class="form-control" name="detail_tempat" id="inputGroupSelect01">
                            <option selected>Pilih Tipe Tempat</option>
                            <option value="EKONOMI">EKONOMI</option>
                            <option value="BISNIS">BISNIS</option>
                            <option value="EKSEKUTIF">EKSEKUTIF</option>
                            </select>
                        {{-- <input type="text" name="detail_tempat" class="form-control" placeholder="Name"> --}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                            <strong>Harga:</strong>
                            <select class="form-control" name="harga" id="inputGroupSelect01">
                                <option selected>Harga</option>
                                <option value="Rp.3.000.000">Rp.3.000.000</option>
                                <option value="Rp.5.000.000">Rp.5.000.000</option>
                                <option value="Rp.8.000.000">Rp.8.000.000</option>
                                </select>
                            {{-- <input type="text" name="detail_tempat" class="form-control" placeholder="Name"> --}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tanggal_Pemesanan:</strong>
                        <input type="date" name="tanggal_pemesanan" class="form-control" placeholder="Harga">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {{-- <strong>Tanggal_Pemesanan:</strong> --}}
                        <input type="hidden" name="id_pelanggan" class="form-control" value="{{ auth()->user()->id }}">
                    </div>
                </div>
               
                <div class="mt-2 mb-2 col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="mb-2 btn btn-primary">Submit</button>
                    @if ($message = Session::get('fail'))
                        <div class="alert alert-danger" role="alert">
                            <p>{{ $message }}</p>   
                        </div>
                    @endif
                </div>
                    </div>
                </form>
            </div>

        </div>
        </div>
        </div>
    </div>
  </div>
</div>

</main>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('select[name="detail_tempat"]').on('change', function() {
            var id = $(this).val();
            if (id == 'EKONOMI') {
                $('select[name="harga').empty();
                $('select[name="harga').append(' <option value="Rp3.000.000">Rp.3.000.000</option>');
            } else if(id = 'BISNIS') {
                $('select[name="harga').empty();
                $('select[name="harga').append(' <option value="Rp.5.000.000">Rp.5.000.000</option>');
            }  else if(id = 'EKSEKUTIF') {
                $('select[name="harga').empty();
                $('select[name="harga').append(' <option value="Rp.8.000.000">Rp.8.000.000</option>');
            }
        });
    });
</script>

</body>
</html>

