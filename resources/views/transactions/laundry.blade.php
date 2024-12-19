<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pembayaran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap" rel="stylesheet">

    <!-- CSS Stylesheets -->
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

    <!-- Custom CSS to center the content -->
    <style>
      /* Centering the content vertically and horizontally */
      .center-content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
      }
    </style>
  </head>
  <body>
<div class="container">
    <div class="center-content">
        <div class="card">
            <div class="card-header">Payment</div>
            <div class="card-body">
                <h5>Order ID: {{ $transaction->order_id }}</h5>
                <h5>Total Amount: Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</h5>
                <button id="pay-button" class="btn btn-primary">Pay Now</button>
                <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        snap.pay('<?=$snapToken?>', {
            onSuccess: function(result){
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            onPending: function(result){
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            onError: function(result){
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>
 <!-- JavaScript Files -->
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
 <script src="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap"></script>
 <script src="{{ asset('js/google-map.js') }}"></script>
 <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
