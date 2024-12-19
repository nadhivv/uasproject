<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

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
                      <form method="POST" action="{{ route('penginapan.booking', ['name' => $penginapan->name]) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="checkInDate" class="form-label">Check-In Date</label>
                            <input type="date" class="form-control" id="check_in" name="check_in" value="{{ old('check_in', $check_in_date ?? '') }}" required>
                          </div>
                          <div class="mb-3">
                            <label for="checkOutDate" class="form-label">Check-Out Date</label>
                            <input type="date" class="form-control" id="check_out" name="check_out" value="{{ old('check_out', $check_out_date ?? '') }}" required>
                          </div>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
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
