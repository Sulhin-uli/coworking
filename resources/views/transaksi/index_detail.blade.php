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
      <ol class="mt-4 breadcrumb mb-4">
          <li class="breadcrumb-item active">Detail Pemesanan</li>
      </ol>

      @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>   
        </div>
      @endif
      
      <div class="row">
        <div class="card">
          <div class="mt-2 col-12">
            <table class="table table-success table-striped" id="table_transaksi">
              <thead>
                <tr>
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
            <div class="text-center">
              <a href="/" class="mb-2 btn btn-primary">Selesai</a>
            </div>
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
      $.get("{{ url('tampil_transaksi_detail') }}", {}, function(data, status) {
        $('#table_transaksi').find("#list_data").html(data);
      });
    }

    // Hapus Data
    function hapus(id) {
        var id = id;
        let confirmAction = confirm("Are you sure?");
        if (confirmAction) {
          $.ajax({
          type: "get",
          url: "{{ url('hapus_transaksi') }}/" + id,
          data: "id=" + id,
          success: function(data) {
              tampil_data();
          }
          });
        } else {

        }
    }

</script>

</body>
</html>