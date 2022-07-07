<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">

    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Company Profile</title>
    <style>
      .float-right {
        position: relative;
        left: 1000px;
        top: 2px;
      }
    </style>
  </head>
  <body>
  <body> 

	<a href="/logout_user" class="btn btn-danger float-right">Logout</a>
  <form method="post" action="{{url('/print_month')}}">
    <div class="form-group col-md-6 input_laporan">
      <button type="submit" class="btn btn-primary print">Cetak</button>
      @csrf
      <input type="month" class="form-control input-print" name="tanggal_pemesanan">
    </div>
  </form>

        </p>
        <table class="table table-striped">
            <thead>
                <tr>
                <td>NIK</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Nomor Telepon</td>
                <td>Detail Tempat</td>
                <td>Tanggal Pemesanan</td>
                </tr>
            </thead>
            <tbody>
                @foreach($pelanggan as $pelanggan)
                <tr>
                    <td>#{{$pelanggan->nik}}</td>
                    <td>{{$pelanggan->nama}}</td>
                    <td>{{$pelanggan->alamat}}</td>
                    <td>{{$pelanggan->no_telp}}</td>
                    <td>{{$pelanggan->detail_tempat}}</td>
                    <td>{{$pelanggan->tanggal_pemesanan}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    {{-- <script>
      $( ".print" ).click(function() {
        var date = new Date( $(".input-print").val());
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

       
        $.ajax({
            type: "get",
            url: "{{ url('print_month') }}",
            data: {
              month: month,
              year: year,
            },
            success: function(data) {
              alert(data.view)
            }
        });
      
      });
    </script> --}}
  </body>
</html>