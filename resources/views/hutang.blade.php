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
            <div class="container">
                <h1 class="mb-4">Hutang Piutang</h1>
                {{-- <a href="{{ route('laporanpelanggan.export') }}" class="btn text-bold btn-success mb-2">Export To Excel</a> --}}
                <div class="card-header mb-2">
                    <div class="card-tools">
                        <form action="{{ route('laporanpelanggan') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 200px; ">
                                {{-- <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{$request->get('search')}}"> --}}
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
                            {{ $message }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Hari/Tanggal</th>
                                <th scope="col">Nama Toko</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Total Barang</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- agar nomor berurutan setelah dihapus atau diedit --}}
                            @php
                                $no = 1;
                            @endphp

                            <tr class="text-center">
                                <td>{{ $no++ }}</td>


                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.content-header -->
    </div>
@endsection
