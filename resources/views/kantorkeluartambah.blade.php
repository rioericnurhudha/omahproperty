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
          <h1 class="text-center mb-4">Tambah Data Uang Keluar Kantor</h1>
          <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <form action="/kantorkeluarinsert" method="POST" enctype="multipart/form-data">

                            {{-- enctype untuk foto --}}
                            {{-- csrf wajib untuk input untuk mendapat token --}}
                            @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Hari/Tanggal</label>
                            <input type="text" name="hari_tanggal" class="form-control @error('hari_tanggal') is-invalid @enderror" id="exampleFormControlInput1" placeholder="">
                            @error('hari_tanggal')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control @error('jenis_pembayaran') is-invalid @enderror" id="exampleFormControlInput1" placeholder="">
                            @error('hari_tanggal')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Jumlah Barang</label>
                            <input type="number" name="jumlah_barang" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" id="exampleFormControlInput1" placeholder="">
                            @error('hari_tanggal')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" id="exampleFormControlInput1" placeholder="">
                            @error('hari_tanggal')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Total Harga</label>
                            <input type="text" name="total_harga" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" id="exampleFormControlInput1" placeholder="">
                            @error('hari_tanggal')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" id="exampleFormControlInput1" placeholder="">
                            @error('hari_tanggal')
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
    <!-- /.content-header -->
</div>
@endsection
