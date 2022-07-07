
@extends('layout.v_main')
@section('title','Manajemen Pemesanan')
@section('content')

<main>
  <div class="container-fluid px-4">
      <h1 class="mt-4">Laporan</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Laporan Pemesanan</li>
      </ol>

      @role('admin')
      <div class="mb-2">
        <form method="post" action="{{url('/print_month')}}">
          <div class="form-group col-md-6 input_laporan">
            <input type="month" class="form-control input-print" name="tanggal_pemesanan">
            <button type="submit" class="btn btn-primary print mt-2 ">Cetak</button>
            @csrf
          </div>
        </form>
      </div>
      @endrole

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

<script>

  $(document).ready(function() {
    tampil_data()
  });

  // ------ Tampilkan Data ------
  function tampil_data(){
      $.get("{{ url('tampil_transaksi') }}", {}, function(data, status) {
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

@endsection

