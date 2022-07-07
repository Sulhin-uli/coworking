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
          <li class="mt-4 breadcrumb-item active"><h4>Riwayat Pemesanan</h4></li>
      </ol>
      
      <div class="row">
        <div class="card">
          <div class="mt-2 col-12">
            <table class="table table-success table-striped" id="table_riwayat">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nik</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Telp</th>
                  <th scope="col">Detail Tempat</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Tanggal Pemesanan</th>
                </tr>
              </thead>
              <tbody id="list_data">
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    tampil_data()
  });

  // ------ Tampilkan Data ------
  function tampil_data(){
      $.get("{{ url('tampil_riwayat_single') }}", {}, function(data, status) {
        $('#table_riwayat').find("#list_data").html(data);
      });
    }
</script>

</body>
</html>

