@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Uang Keluar Pelanggan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="container">
        {{-- <h1 class="text-center mb-4">Uang Keluar Pelanggan</h1> --}}
        <a href="/uangkeluartambah/{{$id_proyek}}" class="btn text-bold btn-success mb-3">+ Tambah</a>
        {{-- <div class="card-header mb-2">
            <div class="card-tools">
              <form action="{{route('uangkeluar')}}" method="GET">
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
          </div> --}}
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
                    <th scope="col">Hari/Tanggal</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Harga Satuan Barang</th>
                    <th scope="col">Total Harga</th>
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
                      <td>{{$row->hari_tanggal}}</td>
                      <td>{{$row->nama_barang}}</td>
                      <td>{{$row->jumlah_barang}}</td>
                      <td>{{format_rupiah($row->harga)}}</td>
                      <td>{{format_rupiah($row->total_harga)}}</td>
                      <td>{{$row->keterangan}}</td>
                     
                      <td class="text-center">
                          <a href="/uangkeluartampil/{{$row->id}}" class="btn text-bold text-white btn-warning">Edit</a>
                          <a href="/uangkeluardelete/{{$row->id}}" class="btn text-bold btn-danger">Hapus</a>
                      </td>
                    </tr>
                    @endforeach

                    <tfoot>
                      
                      <tr>
                      <td>Total Uang Masuk :</td>
                      <td>{{ format_rupiah($total_uang_masuk) }} </td>
                    </tr>
                    <tr>
                      <td>Total Pengeluaran :</td>
                      <td>{{ format_rupiah($total_uang_keluar )}} </td>
                    </tr>
                      <td>Sisa Uang Masuk :</td>
                      <td>{{ format_rupiah($sisa_uang) }} </td>
                   

                      
                  </tfoot>
                </tbody>
              </table>
        </div>
    </div>
    </div>

</div>

@endsection
