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
        <h1 class="mb-4 justify-content-center">Daftar Pelanggan</h1>
        <a href="/daftarpelanggantambah" style="height:40px" class="btn text-bold btn-success">+ Tambah</a>
        <div class="card-header mb-2">
            <div class="card-tools">
              <form action="{{route('daftarpelanggan')}}" method="GET">
                <div class="input-group input-group-sm" style="width: 200px; ">
                  <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{$request->get('search')}}">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
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
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No.Hp</th>
                    <th class="text-center" scope="col">Aksi</th>
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
                      <td>{{$row->nama_pelanggan}}</td>
                      <td>{{$row->alamat}}</td>
                      <td>{{$row->no_hp}}</td>
                    <td class="text-center">
                        {{-- {{$row->id}} : didapat dari tabel daftarpelanggan --}}
                          <a href="/proyek/{{$row->id}}" class="btn text-bold btn-primary ">Detail</a>
                          <a href="/daftarpelanggantampil/{{$row->id}}" class="btn text-bold text-white btn-warning">Edit</a>
                          <a href="/daftarpelanggandelete/{{$row->id}}"  class="btn text-bold btn-danger">Hapus</a>
                      </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
      </div>
         </div>
    </div>

@endsection
@if ($message = Session::get('success'))
<script>
    Swal.fire('{{$message}}');
</script>
@endif
@if ($message = Session::get('failed'))
<script>
    Swal.fire('{{$message}}');
</script>
@endif
