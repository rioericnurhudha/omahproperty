@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0">Dashboard</h1> --}}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="container ">
          <h1 class="text-center mb-4">Tambah Data Uang Masuk</h1>
          <h1>
           </h1>
          <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <form action="/uangmasukinsert" method="POST" enctype="multipart/form-data">

                            {{-- enctype untuk foto --}}
                            {{-- csrf wajib untuk input untuk mendapat token --}}
                            @csrf

                            <input type="hidden" name="id_proyek" value="{{ $id_proyek }}">

                            
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Hari/Tanggal</label>
                              <input type="date" name="hari_tanggal" class="form-control @error('hari_tanggal') is-invalid @enderror" id="exampleFormControlInput1">
                              @error('hari_tanggal')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                          
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Jenis Pembayaran</label>
                            <input type="text" name="jenis_pembayaran" class="form-control @error('jenis_pembayaran') is-invalid @enderror" id="exampleFormControlInput1" placeholder="">
                            @error('jenis_pembayaran')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Jumlah Pembayaran</label>
                            <input type="text" name="jumlah_pembayaran" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" id="exampleFormControlInput1" placeholder="">
                            @error('jumlah_pembayaran')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
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
