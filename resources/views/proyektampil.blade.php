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
            <h1 class="text-center mb-4">Edit Data Proyek</h1>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="/proyekupdate/{{$data->id}}" method="POST" enctype="multipart/form-data">
                                {{-- enctype untuk foto --}}
                                {{-- csrf wajib untuk input untuk mendapat token --}}
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Proyek</label>
                                    <input type="text" name="type_proyek" class="form-control @error('type_proyek') is-invalid @enderror" id="exampleFormControlInput1" placeholder="" value="{{ $data->type_proyek }}">
                                    @error('type_proyek')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Lokasi Proyek</label>
                                    <input type="text" name="lokasi_proyek" class="form-control @error('lokasi_proyek') is-invalid @enderror" id="exampleFormControlInput1" placeholder="" value="{{ $data->lokasi_proyek }}">
                                    @error('lokasi_proyek')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    @if($data->gambar_proyek)
                                    <img src="{{ asset('images/'.$data->gambar_proyek) }}" alt="Gambar Proyek" width="70" class="mb-3">
                                    @endif
                                    <label for="gambarProyek" class="form-label">Gambar Proyek</label>
                                    <input type="file" name="gambar_proyek" class="form-control @error('gambar_proyek') is-invalid @enderror" id="gambarProyek">
                                    @error('gambar_proyek')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Harga Proyek</label>
                                    <input type="text" name="harga_proyek" class="form-control @error('harga_proyek') is-invalid @enderror" id="exampleFormControlInput1" placeholder="" value="{{ $data->harga_proyek }}">
                                    @error('harga_proyek')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="exampleFormControlInput1" placeholder="" value="{{ $data->keterangan }}">
                                    @error('keterangan')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
</div>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
    });
</script>
@endif

@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1500
        });
    });
</script>
@endif

@endsection
