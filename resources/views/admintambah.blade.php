@extends('layout.admin')

@section('content')

<div class="container ">
    <h1 class="text-center mb-4">Tambah Data Admin</h1>
    <div class="row justify-content-center">
      <div class="col-6">
          <div class="card">
              <div class="card-body">
                  <form action="/insertadmin" method="POST" enctype="multipart/form-data">
                      @csrf
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">email</label>
                      <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">No Hp</label>
                      <input type="number" name="no_hp" class="form-control" id="exampleFormControlInput1" placeholder="">
                  </div>

                  <button type="submit" class="btn btn-primary">submit</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
