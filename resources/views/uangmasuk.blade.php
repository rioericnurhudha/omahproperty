@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Uang Masuk Proyek
                          
                        </h1>

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <div class="container">
                {{-- <h1 class="text-center mb-4">Uang Masuk Pelanggan</h1> --}}
                
                <a href="/uangmasuktambah/{{$id_proyek}}" class="btn text-bold btn-success mb-3">+ Tambah</a>
                <a href="/uangkeluar/{{ $id_proyek }}" class="btn text-bold btn-primary mb-3">Detail Pengeluaran</a>

                <div class="card-header mb-2">
                    <div class="card-tools">
                        {{-- <form action="{{ route('searchuangmasuk') }}" method="GET"> --}}
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
                                {{-- <th scope="col">Nama Pelanggan</th> --}}
                                <th scope="col">Hari/Tanggal</th>
                                <th scope="col">Jenis Pembayaran</th>
                                <th scope="col">Jumlah Pembayaran</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- agar nomor berurutan setelah dihapus atau diedit --}}
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $row)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $row->hari_tanggal }}</td>
                                    <td>{{ $row->jenis_pembayaran }}</td>
                                    <td>{{format_rupiah( $row->jumlah_pembayaran )}}</td>
                                    <td>
                                        <a href="/uangmasuktampil/{{ $row->id }}" class="btn text-white text-bold btn-warning">Edit</a>
                                        <button class="btn btn-danger" onclick="deleteUangMasuk({{ $row->id }})">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach

                        <tfoot>
                            <td></td>
                            <td></td>
                            <td>Total Pembayaran</td>
                          
                            <td>{{format_rupiah( $total_uang_masuk )}} </td>
                          
                            <td></td>
                            <td></td>
                        </tfoot>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @include('sweetalert::alert')

    <!-- Script untuk SweetAlert2 dengan ikon -->
    <script>
        function deleteUangMasuk(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: '<i class="fa fa-trash-alt"></i> Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect atau hapus data
                    window.location = '/uangmasukdelete/' + id;
                }
            });
        }
    </script>
</div>

@endsection
