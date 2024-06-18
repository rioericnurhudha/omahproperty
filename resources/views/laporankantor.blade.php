<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMAHPRO-ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <h1 class="text-center mb-4">Laporan Kantor</h1>
        <a href="/uangmasuktambah" class="btn btn-success mb-2">+tambah</a>
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
                    <th scope="col">Uang Masuk</th>
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
                      <td>{{$row->uang_masuk}}</td>
                      <td>{{$row->keterangan}}</td>
                      <td>
                          <a href="/uangmasuktampil/{{$row->id}}" class="btn btn-primary">Kegiatan Transaksi</a>
                      </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
