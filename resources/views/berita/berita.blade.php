<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome-free/css/all.min.css')}}">

    <title>C0-WORKING SPACE</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><strong>CO-WORKING SPACE</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link ml-5" href="/">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ml-5" href="/berita">BERITA</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link ml-5" href="/riwayat">RIWAYAT PEMESANAN</a>
            </li> --}}
            @guest
            <li class="nav-item">
              <a class="nav-link ml-5" href="/register">REGISTRASI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ml-5" href="/login">LOGIN</a>
            </li>
            @endguest
            @role('pelanggan')
            <li class="nav-item">
              <a class="nav-link ml-5" href="/riwayat_single">RIWAYAT PEMESANAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ml-5" href="/logout">LOGOUT</a>
            </li>
            @endrole
            @role('admin')
            <li class="nav-item">
              <a class="nav-link ml-5" href="/riwayat">RIWAYAT PEMESANAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ml-5" href="/logout">LOGOUT</a>
            </li>
            @endrole
          </ul>
        </div>
      </div>
    </nav>

      <div class="jumbotron">
          <h1 class="display-4">CO-WORKING SPACE</h1>
          <hr class="my-4">
          <!-- <p class="lead"><strong> Pesan Ruanganmu Sekarang</strong></p> -->
          {{-- <a class="btn btn-primary" href="#" role="button">Pesan Sekarang</a> --}}
    </div>

    

        <h3 class="mt-5 text-center">Berita</h3>
        <hr>

        @foreach ($beritas as $berita)
            <div class="mt-5 mb-3 card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $berita->judul }}</h5>
                    <p class="card-text">{{  mb_strimwidth($berita->isi, 0, 50, "...") }}</p>
                    <button data-bs-toggle="modal" data-bs-target="#modalFormBerita" class="btn btn-primary" onclick="edit({{ $berita->id }})">baca</button>
                </div>
            </div>
        @endforeach

<footer class="bg-dark text-white p-5">
    <div class="row">
      <div class="col-md-3">
        <h5>LAYANAN PELANGGAN</h5>
        <ul>
          <li>Pusat Bantuan</li>
          <li>Cara Pemesanan</li>
          <li>Layanan Ruangan</li>
          <li>Layanan Prima</li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>MITRA KERJASAMA</h5>
        <ul>
          <li>Menara Sarinah</li>
          <li>IKEA</li>
          <li>Livien</li>
          <li>Laundry Service</li>
          <li>Perusahaan Jasa Pengriminan</li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>KUNJUNGI OUTLET KAMI</h5>
        <div class="container">
       <div class="embed-responsive embed-responsive-16by9">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.666466960686!2d106.82496411430981!3d-6.175387062231808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sNational%20Monument!5e0!3m2!1sen!2sid!4v1600145553216!5m2!1sen!2sid" width="200" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
       </div>
     </div>
      </div>
      <div class="col-md-3">
        <h5>HUBUNGI KAMI</h5>
        <ul>
          <li>021-234567</li>
          <li>PO-BOX JAKARTA 10.000</li>
          <li>ban-tuan@gmail.com</li>
        </ul>
      </div>
    </div>
  </footer>

  <div class="copyright text-center text-white font-weight-bold bg-danger p-4">
    <p>Aplikasi Dilindungi Oleh Hak Cipta <i class="far fa-copyright"></i>2020</p>
  </div>

  <div class="modal fade" id="modalFormBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p class="paragraph"></p>
                    <hr>
                    <p class="tanggal"></p>
                </div>
            </div>
        </div>
    </div>
  </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        function edit(id) {
        var id = id;
        $.ajax({
            url: '/edit_berita/'+ id,
            method: "GET",
            success:function(data) {
                $(".modal-title").append(data.judul);
                $(".paragraph").append(data.isi);
                // $(".edit_isi").val(data.isi);
                // $(".edit_id").val(data.id);
            }
         });
        }
    </script>
  </body>
</html>