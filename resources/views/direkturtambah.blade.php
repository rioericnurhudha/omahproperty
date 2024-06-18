<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMAHPRO-ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
      <div class="container ">
          <h1 class="text-center mb-4">Tambah Data Direktur</h1>
          <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/direkturinsert" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No Hp</label>
                            <input type="number" name="no_hp" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>

                        <button type="submit" class="btn btn-primary">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
