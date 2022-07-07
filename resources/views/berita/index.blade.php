
@extends('layout.v_main')
@section('title','Manajemen User')
@section('content')

<main>
  <div class="container-fluid px-4">
      <h1 class="mt-4">Manajemen Berita</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Manajemen Berita</li>
      </ol>
        @role('admin')
          <button class="mb-2 btn btn-primary save" data-bs-toggle="modal" data-bs-target="#modalFormTambah">Tambah</button>
        @endrole
      <div class="row">
        <div class="card">
          <div class="mt-2 col-12">
            <table class="table table-success table-striped" id="table_id">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Isi</th>
                  <th scope="col">Waktu</th>
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
<div class="modal fade" id="modalFormTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form onsubmit="return false">
                  <div class="mb-3">
                      <label class="form-label">Judul</label>
                      <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Isi</label>
                    <textarea class="form-control" name="isi" id="isi" cols="30" rows="10"></textarea>
                  </div>
                  <div class="modal-footer d-block">
                      <button type="submit" class="btn btn-success float-end" onclick="save()" >Submit</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

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
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control edit_judul" id="judul" name="judul" placeholder="judul" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Isi</label>
                    <textarea class="form-control edit_isi" name="isi" id="isi" cols="30" rows="10"></textarea>
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
      $.get("{{ url('tampil_berita') }}", {}, function(data, status) {
        $('#table_id').find("#list_data").html(data);
      });
    }

    // save data
  function save() {
      var judul = $("#judul").val();
      var isi = $("#isi").val();

      $.ajax({
          type: "get",
          url: "{{ url('save_berita') }}",
          data: {
            judul: judul,
            isi: isi
          },
          success: function(data) {
            $('#modalFormTambah').modal('hide');
            tampil_data();
            // alert('success')
          }
      });
    }

    // Hapus Data
    function hapus(id) {
        var id = id;
        let confirmAction = confirm("Are you sure?");
        if (confirmAction) {
          $.ajax({
          type: "get",
          url: "{{ url('hapus_berita') }}/" + id,
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
          url: '/edit_berita/'+ id,
          method: "GET",
          success:function(data) {
            $(".edit_judul").val(data.judul);
            $(".edit_isi").val(data.isi);
            $(".edit_id").val(data.id);
          }
      });
    }

    function submit_edit() {
      var judul = $(".edit_judul").val();
      var isi = $(".edit_isi").val();
      var id = $(".edit_id").val();

      $.ajax({
            type: "get",
            url: "{{ url('submit_edit_berita') }}/"+id,
            data: {
              judul: judul,
              isi: isi,
              id: id
            },
            success: function(data) {
            //  alert(data)
            $('#modalFormEdit').modal('hide');
            tampil_data();
            }
        });
    }

</script>

@endsection

