<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Htemplate</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  </head>
  <body>


    <section id="makanan" class="ftco-section ftco-menu bg-light">
        <div class="container-fluid px-md-4">
            <!-- Header Section -->
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Pesan Penginapan</span>
                    <h2>Detail Pembayaran Penginapan</h2>
                </div>
            </div>
            <!-- Menu Section -->
            <div class="card mb-4">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            @if(isset($error))
                                <p class="text-danger">{{ $error }}</p> <!-- Menampilkan pesan error -->
                            @elseif($penginapan)
                                <h5 class="card-title">{{ $penginapan->name }}</h5>
                                <p class="card-text">Harga: Rp {{ number_format($penginapan->harga, 0, ',', '.') }}</p>
                            @endif
                            <p class="card-text">Nikmati layanan laundry selama menginap.</p>
            
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
    </section>




  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('js/google-map.js') }}"></script>
  <script ript src="{{ asset('js/main.js') }}"></script>


  </body>
</html>
