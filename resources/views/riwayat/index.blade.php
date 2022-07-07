
@extends('layout.v_main')
@section('title','Riwayat Pemesanan')
@section('content')

<main>
  <div class="container-fluid px-4">
      <h1 class="mt-4">Riwayat Pemesanan</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Riwayat Pemesanan</li>
      </ol>

    <a href="/form" class="mb-2 btn btn-primary">Pesan Sekarang</a>

      
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
                  <th scope="col">Action</th>
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

<script>
  $(document).ready(function() {
    tampil_data()
  });

  // ------ Tampilkan Data ------
  function tampil_data(){
      $.get("{{ url('tampil_riwayat') }}", {}, function(data, status) {
        $('#table_riwayat').find("#list_data").html(data);
      });
    }

      // Hapus Data
  function hapus(id) {
      var id = id;
      let confirmAction = confirm("Are you sure?");
      if (confirmAction) {
        $.ajax({
        type: "get",
        url: "{{ url('hapus_riwayat') }}/" + id,
        data: "id=" + id,
        success: function(data) {
            tampil_data();
        }
        });
      } else {

      }
  }
</script>
@endsection

