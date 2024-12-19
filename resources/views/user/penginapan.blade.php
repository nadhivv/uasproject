<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
              <h5 class="card-title fw-semibold mb-4 text-center">{{ $penginapan->name }}</h5>

              <div class="card mx-auto" style="max-width: 800px;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                      <img src="{{ asset($penginapan->image_url) }}" class="img-fluid" alt="Gambar Penginapan">
                    </div>
                    <div class="col-md-8">
                      <form action="{{ route('penginapan.booking', ['name' => $penginapan->name]) }}" method="POST">
                        @csrf
                   
                        
                        <div class="form-group">
                          <label for="check_in">Nama</label>
                          <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                      </div>
                      <div class="form-group">
                        <label for="check_in">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                        <div class="form-group">
                            <label for="check_in">Check In</label>
                            <input type="date" name="check_in" class="form-control" value="{{ old('check_in') }}" required>
                        </div>
                
                        <div class="form-group">
                            <label for="check_out">Check Out</label>
                            <input type="date" name="check_out" class="form-control" value="{{ old('check_out') }}" required>
                        </div>
                
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input type="number" name="total_harga" class="form-control" value="{{ $penginapan->price }}" required>
                        </div>
                
                        <button type="submit" class="btn btn-success">Pesan Sekarang</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>




  </div>


  </div>

  


  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>