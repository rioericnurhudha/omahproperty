@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Edit Uang Masuk Pelanggan
                        {{-- {{ $nama_pelanggan }} --}}
                    {{-- </h1> --}}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<div class="container ">
    <h1 class="text-center mb-4">Edit Data Uang Masuk</h1>
    <div class="row justify-content-center">
      <div class="col-6">
          <div class="card">
              <div class="card-body">
                  <form action="/uangmasukupdate/{{$data->id}}" method="POST" enctype="multipart/form-data">
                      {{-- enctype untuk foto --}}
                      {{-- csrf wajib untuk input untuk mendapat token --}}
                      @csrf
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Hari/Tanggal</label>
                      <input type="text" name="hari_tanggal" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->hari_tanggal}}" >
                  </div>
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Jenis Pembayaran</label>
                      <input type="text" name="jenis_pembayaran" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->jenis_pembayaran}}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Jumlah Pembayaran</label>
                      <input type="text" name="jumlah_pembayaran" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->jumlah_pembayaran}}">
                  </div>
                  <button type="submit" class="btn btn-primary">submit</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


@endsection
