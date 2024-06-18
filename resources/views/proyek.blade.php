@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="mb-4">Proyek Dari Pelanggan :        
              <b>  <td>{{$nama_pelanggan}}</td></b> 
        </h1>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="container">
        <a href="/proyektambah/{{ $id_pelanggan }}" class="btn btn-success text-bold mb-3">+ Tambah</a>

        <div class="row">
            {{-- menampilkan alert data berhasil ditambahkan, ganti, dan hapus --}}
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif


            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    {{-- <th scope="col">Nama Pelanggan</th> --}}
                    <th scope="col">Type Proyek</th>
                    <th scope="col">Lokasi Proyek</th>
                    <th scope="col">Gambar Proyek</th>
                    <th scope="col">Harga Proyek</th>
                    <th scope="col">Status Proyek</th>
                    <th scope="col">Keterangan</th>
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
                        {{-- <td>{{$row->daftarpelanggan->nama_pelanggan}}</td> --}}
                        <td>{{$row->type_proyek}}</td>
                        <td>{{$row->lokasi_proyek}}</td>
                        <td>
                            <img src="{{ asset('images/'.$row->gambar_proyek) }}" alt="Gambar Proyek" width="70">
                        </td>
                        <td>{{format_rupiah($row->harga_proyek)}}</td>
                        <td>{{$row->status_proyek}}</td>
                        <td>{{$row->keterangan}}</td>
                        
                      <td class="text-center">
                        <a href="/uangmasuk/{{$row->id}}" class="btn text-bold btn-primary">Detail</a>

                          <a href="/proyektampil/{{$row->id}}" class="btn text-bold text-white btn-warning">Edit</a>
                          <a href="/proyekdelete/{{$row->id}}" class="btn text-bold btn-danger">Hapus</a>
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
