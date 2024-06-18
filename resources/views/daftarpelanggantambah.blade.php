@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0">Tambah Data Pelanggan</h1> --}}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="container">
          <h1 class="text-center mb-4">Edit Data Pelanggan</h1>
          <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/daftarpelangganinsert" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" class="form-control text-white" id="exampleFormControlInput1" placeholder="">
                            @error('nama_pelanggan')
                            <small class="text-danger text-bold">{{ $message }}</small>
                        @enderror
                          </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No.Hp</label>
                            <input type="number" name="no_hp" class="form-control " id="exampleFormControlInput1" placeholder="">
                            @error('no_hp')
                            <small class="text-danger text-bold">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="">
                            @error('alamat')
                            <small class="text-danger text-bold">{{ $message }}</small>
                        @enderror
                          </div>
                        <a href="/daftarpelanggan" class="btn btn-primary">kembali</a>
                        <button type="submit" class="btn btn-primary">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
