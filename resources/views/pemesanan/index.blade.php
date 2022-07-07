
@extends('layout.v_main')
@section('title','Manajemen Pemesanan')
@section('content')

<main>
  <div class="container-fluid px-4">
      <h1 class="mt-4">Tipe Pemesanan</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Tipe Pemesanan</li>
      </ol>
        {{-- @role('admin')
          <button class="mb-2 btn btn-primary save" data-bs-toggle="modal" data-bs-target="#modalFormTambah">Tambah</button>
        @endrole --}}
      <div class="row">
        <div class="card">
          <div class="mt-2 col-12">
            <table class="table table-success table-striped" id="table_pemesanan">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode tipe</th>
                  <th scope="col">Nama tipe</th>
                  <th scope="col">harga</th>
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
 
<!-- Modal Tambah-->
{{-- <div class="modal fade" id="modalFormTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form onsubmit="return false">
                  <div class="mb-3">
                      <label class="form-label">Kode Tipe</label>
                      <input type="text" class="form-control" id="kode_tipe" name="kode_tipe" placeholder="Kode Tipe" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Nama Tipe</label>
                    <input type="text" class="form-control" id="nama_tipe" name="nama_tipe" placeholder="Nama Tipe" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="harga" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Fasilitas</label>
                    <input type="text" class="form-control" id="fasilitas" name="fasilitas" placeholder="fasilitas" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Gambar Tempat</label>
                    <input type="text" class="form-control" id="gambar_tempat" name="gambar_tempat" placeholder="Gambar Tempat" />
                  </div>
                  <div class="modal-footer d-block">
                      <button type="submit" class="btn btn-success float-end" onclick="save()" >Submit</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div> --}}

<!-- Modal Edit-->
<div class="modal fade" id="modalFormEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form onsubmit="return false">
                  <div class="mb-3">
                      <label class="form-label">Kode Tipe</label>
                      <input type="text" class="form-control edit_kode_tipe" id="kode_tipe" name="kode_tipe" placeholder="Kode Tipe" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Nama Tipe</label>
                    <input type="text" class="form-control edit_nama_tipe" id="nama_tipe" name="nama_tipe" placeholder="Nama Tipe" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="text" class="form-control edit_harga" id="harga" name="harga" placeholder="harga" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Fasilitas</label>
                    <input type="text" class="form-control edit_fasilitas" id="fasilitas" name="fasilitas" placeholder="fasilitas" />
                  </div>
                  <input type="hidden" class="edit_id">
                  <div class="modal-footer d-block">
                      <button type="submit" class="btn btn-success float-end" onclick="submit_edit()" >Submit</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

<script>

  $(document).ready(function() {
    tampil_data()
  });

  // ------ Tampilkan Data ------
  function tampil_data(){
      $.get("{{ url('tampil_pemesanan') }}", {}, function(data, status) {
        $('#table_pemesanan').find("#list_data").html(data);
      });
    }

    // save data
  function save() {
      var kode_tipe = $("#kode_tipe").val();
      var nama_tipe = $("#nama_tipe").val();
      var harga = $("#harga").val();
      var fasilitas = $("#fasilitas").val();
      var gambar_tempat = $("#gambar_tempat").val();

          $.ajax({
          type: "get",
          url: "{{ url('save_pemesanan') }}",
          data: {
            kode_tipe: kode_tipe,
            nama_tipe: nama_tipe,
            harga: harga,
            fasilitas: fasilitas,
            gambar_tempat:gambar_tempat
          },
          success: function(data) {
            $('#modalFormTambah').modal('hide');
            tampil_data();
          }
      })
    }

    // Hapus Data
    function hapus(id) {
        var id = id;
        let confirmAction = confirm("Are you sure?");
        if (confirmAction) {
          $.ajax({
          type: "get",
          url: "{{ url('hapus_pemesanan') }}/" + id,
          data: "id=" + id,
          success: function(data) {
              tampil_data();
          }
          });
        } else {

        }
    }

    function edit(id) {
      var id = id;
      $.ajax({
          url: '/edit_pemesanan/'+ id,
          method: "GET",
          success:function(data) {
            $(".edit_kode_tipe").val(data.kode_tipe);
            $(".edit_nama_tipe").val(data.nama_tipe);
            $(".edit_harga").val(data.harga);
            $(".edit_fasilitas").val(data.fasilitas);
            $(".edit_gambar_tempat").val(data.gambar_tempat);
            $(".edit_id").val(data.id);
             
          }
      });
    }

    function submit_edit() {
      var kode_tipe = $(".edit_kode_tipe").val();
      var nama_tipe = $(".edit_nama_tipe").val();
      var harga = $(".edit_harga").val();
      var fasilitas = $(".edit_fasilitas").val();
      var gambar_tempat = $(".edit_gambar_tempat").val();
      var id = $(".edit_id").val();

          $.ajax({
          type: "get",
          url: "{{ url('submit_edit_pemesanan') }}/" + id,
          data: {
            kode_tipe: kode_tipe,
            nama_tipe: nama_tipe,
            harga: harga,
            fasilitas: fasilitas,
            gambar_tempat:gambar_tempat
          },
          success: function(data) {
            $('#modalFormEdit').modal('hide');
            tampil_data();
          }
      })
    }

</script>

@endsection

