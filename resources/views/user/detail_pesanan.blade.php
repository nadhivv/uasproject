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
                    <span class="subheading">Pesan Makanan</span>
                    <h2>Detail Pesanan</h2>
                </div>
            </div>
            <!-- Menu Section -->
            <div class="card mb-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/images/' . $makanan->photo) }}" class="img-fluid rounded-start" alt="{{ $makanan->nama_makanan }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $makanan->nama_makanan }}</h5>
                            <p class="card-text">Harga: Rp {{ number_format($makanan->harga, 0, ',', '.') }}</p>
                            <p class="card-text">Nikmati hidangan yang menggugah selera anda selama menginap.</p>
                            <form action="{{ route('transactions.process') }}" method="POST">
                                @csrf
                                <input type="hidden" name="makanan_id" value="{{ $makanan->id }}">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <div class="input-group" style="max-width: 150px;">
                                        <button type="button" class="btn btn-outline-secondary" id="minus-btn">-</button>
                                        <input type="number" class="form-control text-center" id="quantity" name="quantity" min="1" max="{{ $makanan->stock }}" value="1" style="width: 60px;">
                                        <button type="button" class="btn btn-outline-secondary" id="plus-btn">+</button>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   {{-- @include('user.layout.footer') --}}



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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInput = document.getElementById('quantity');
        const plusBtn = document.getElementById('plus-btn');
        const minusBtn = document.getElementById('minus-btn');
        const maxQuantity = {{ $makanan->stock }};

        // Handle plus button click
        plusBtn.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue < maxQuantity) {
                quantityInput.value = currentValue + 1;
            }
        });

        // Handle minus button click
        minusBtn.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });
    });
</script>

  </body>
</html>
