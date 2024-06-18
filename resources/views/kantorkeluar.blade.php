@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Keuangan Kantor Keluar</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="container">
          {{-- <h1 class="text-center mb-4">Uang Keluar Kantor</h1> --}}
          <a href="/kantorkeluartambah" class="btn btn-success mb-3">+tambah</a>
          <div class="row">
              {{-- menampilkan alert data berhasil ditambahkan, ganti, dan hapus --}}
              @if ($message = Session::get('success'))
              <div class="alert alert-success" role="alert">
                  {{$message}}
              </div>
              @endif

              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Hari/Tanggal</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Jumlah Barang</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Total Harga</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      {{-- agar nomor berurutan setelah dihapus atau diedit --}}
                      @php
                          $no = 1;
                      @endphp
                      @foreach ($data as $row )

                      <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$row->hari_tanggal}}</td>
                        <td>{{$row->nama_barang}}</td>
                        <td>{{$row->jumlah_barang}}</td>
                        <td>{{$row->harga}}</td>
                        <td>{{$row->total_harga}}</td>
                        <td>{{$row->keterangan}}</td>
                        <td>
                            <a href="/kantorkeluartampil/{{$row->id}}" class="btn btn-primary">edit</a>
                            <a href="/kantorkeluardelete/{{$row->id}}" class="btn btn-danger">hapus</a>
                        </td>
                      </tr>
                      @endforeach

                  </tbody>
                </table>
          </div>
      </div>
    </div>
    <!-- /.content-header -->
</div>
@endsection
