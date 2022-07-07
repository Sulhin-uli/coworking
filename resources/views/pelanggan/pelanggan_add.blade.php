<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    {{-- <link rel="stylesheet" type="text/css" href="style.css"> --}}
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">

    {{-- Bootstrap 4 --}}
    {{-- css --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- js --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <title>Company Profile</title>
  </head>
  <body>
    <nav class="text">
        <h3 class="text-center">FORM PENDAFTARAN</h3>
      </nav>

      <section class="container-fluid">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
            <form class="form-container">
                <h4 class="text-center font-weight-bold"> Sign-Up </h4>
                {{-- @if ($message = Session::get('success')) --}}
                <div class="alert alert-success" role="alert">
                    This is a success alert—check it out!
                  </div>
                {{-- @endif --}}
                <form method="post" action="{{url('/pelanggan/save')}}">
                
                <div class="form-group text-center">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK">
                </div>
                @csrf
                <div class="form-group text-center">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group text-center">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat">
                </div>
                <div class="form-group text-center">
                    <label for="no_telp">Telp</label>
                    <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan Telp">
                </div>
                <div class="form-group text-center">
                    <label for="detail_tempat">Tipe Tempat</label>
                    <input type="text" class="form-control" name="detail_tempat" id="detail_tempat" placeholder="Masukkan Tempat">
                </div>
                <div class="form-group text-center">
                    <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                    <input type="date" class="form-control" name="tanggal_pemesanan" id="InputRePassword" placeholder="Re-Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
        </section>
    </section>
  </body>
</html>
