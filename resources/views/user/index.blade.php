
@extends('layout.v_main')
@section('title','Manajemen User')
@section('content')

<main>
  <div class="container-fluid px-4">
      <h1 class="mt-4">Manajemen User</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Manajemen User</li>
      </ol>
        @role('admin')
          <button class="mb-2 btn btn-primary save" data-bs-toggle="modal" data-bs-target="#modalFormTambah">Tambah</button>
        @endrole
      <div class="row">
        <div class="card">
          <div class="mt-2 col-12">
            <table class="table table-success table-striped" id="table_user">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">nama</th>
                  <th scope="col">email</th>
                  <th scope="col">password</th>
                  <th scope="col">role</th>
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
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-select" id="role" aria-label="Default select example">
                      <option value="admin">admin</option>
                    </select>
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
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control edit_name" id="name" name="name" placeholder="Name" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control edit_email" id="email" name="email" placeholder="Email" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password Saat ini</label>
                    <input type="password" class="form-control edit_password" id="password" name="password" placeholder="password" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password Baru </label>
                    <input type="password" class="form-control password2" id="password2" name="password2" placeholder="Konfirmasi Password" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Konfirmasi Password </label>
                    <input type="password" class="form-control edit_password3" id="password3" name="password3" placeholder="Password Baru" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-select edit_role" id="role" aria-label="Default select example">
                      <option value="admin">admin</option>
                      <option value="kasir">kasir</option>
                    </select>
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
      $.get("{{ url('tampil_user') }}", {}, function(data, status) {
        $('#table_user').find("#list_data").html(data);
      });
    }

    // save data
  function save() {
      var name = $("#name").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var password2 = $("#password2").val();
      var role = $("#role").val();

      if (password != password2) {
        alert('Konfirmasi Password Salah')
      } else {
        $.ajax({
          type: "get",
          url: "{{ url('save_user') }}",
          data: {
            name: name,
            email: email,
            password: password,
            role:role
          },
          success: function(data) {
            $('#modalFormTambah').modal('hide');
            tampil_data();
          }
        })
      }

    }

    // Hapus Data
    function hapus(id) {
        var id = id;
        let confirmAction = confirm("Are you sure?");
        if (confirmAction) {
          $.ajax({
          type: "get",
          url: "{{ url('hapus_user') }}/" + id,
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
          url: '/edit_user/'+ id,
          method: "GET",
          success:function(data) {
            $(".edit_name").val(data.name);
            $(".edit_email").val(data.email);
            $(".edit_role").val(data.role);
            $(".edit_id").val(data.id);
          }
      });
    }

    function submit_edit() {
      var name = $(".edit_name").val();
      var email = $(".edit_email").val();
      var password = $(".edit_password").val();
      var password2 = $(".edit_password2").val();
      var password3 = $(".edit_password2").val();
      var role = $(".edit_role").val();
      var id = $(".edit_id").val();


      if (password2 != password3) {
        alert('Konfirmasi Password Salah')
        } else {
          $.ajax({
              type: "get",
              url: "{{ url('submit_edit_user') }}/"+id,
              data: {
                name: name,
                email: email,
                password: password,
                password2: password3,
                role:role,
                id: id
              },
              success: function(data) {
              //  alert(data)
                if (data == 'fail email') {
                  alert('Emali sudah ada')
                } else if (data == 'fail password') {
                  alert('Password saat ini salah')
                } else if(data == 'success') {
                  $('#modalFormEdit').modal('hide');
                  tampil_data();
                } else {
                  console.log(data)
                }
              }
          });
        }
    }

</script>

@endsection

