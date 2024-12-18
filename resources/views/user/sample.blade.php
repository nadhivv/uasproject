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
  <div class="page-wrapper" id="main-wrapper"  >
    <!-- Sidebar Start -->
   
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper" >
      <!--  Header Start -->
      <header class="app-header">
        <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-12">
                        <form action="#" class="booking-form aside-stretch">
                        <div class="row">
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                            <label for="#">Check-in Date</label>
                                            <input type="text" class="form-control checkin_date" placeholder="Check-in date">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                            <label for="#">Check-out Date</label>
                                            <input type="text" class="form-control checkout_date" placeholder="Check-out date">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                          <label for="#">Room</label>
                                          <div class="form-field">
                                            <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">Suite</option>
                                      <option value="">Family Room</option>
                                      <option value="">Deluxe Room</option>
                                      <option value="">Classic Room</option>
                                      <option value="">Superior Room</option>
                                      <option value="">Luxury Room</option>
                                    </select>
                                  </div>
                                  </div>
                                </div>
                          </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                          <label for="#">Guests</label>
                                          <div class="form-field">
                                            <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">1 Adult</option>
                                      <option value="">2 Adult</option>
                                      <option value="">3 Adult</option>
                                      <option value="">4 Adult</option>
                                      <option value="">5 Adult</option>
                                      <option value="">6 Adult</option>
                                    </select>
                                  </div>
                                  </div>
                                </div>
                          </div>
                            </div>
                            <div class="col-md d-flex">
                                <div class="form-group d-flex align-self-stretch">
                              <a href="#" class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block"><span>Check Availability <small>Best Price Guaranteed!</small></span></a>
                            </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </section>
      </header>
      
      <!--  Header End -->





      <div class="container-fluid" >
        <div class="container-fluid">
          <div class="card">
            <div class="card-body" >
              <h5 class="card-title fw-semibold mb-4">Rooms</h5>
              <div class="card" >
                <div class="card-body"  >
                  
                  <form>

                    <div class="room-wrap d-md-flex ftco-animate" style="--61b7e5a8: 99999999; --61b0a037: 220px; --8ad72654: 373.890625px; margin-bottom: 20px;">
                      <a href="#" class="img" style="background-image: url('{{ asset('images/testimony-img.jpg') }}'); width: 50%; height: 0; padding-bottom: 50%; background-size: cover; background-position: center;"></a>
                      <div class="half left-arrow d-flex align-items-center" style="width: 50%;">
                          <div class="text p-4 text-right"> <!-- Mengubah text-center menjadi text-right -->
                              <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                              <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
                              <h3 class="mb-3"><a href="rooms.html">Suite Room</a></h3>
                              <p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                              <p class="pt-1">
                                  <a href="room-single.html" class="btn-custom px-3 py-2 rounded" style="display: inline-block; border: 1px solid #000; padding: 10px 20px; text-align: center;">
                                      Book Now <span class="icon-long-arrow-right"></span>
                                  </a>
                              </p>
                          </div>
                      </div>
                  </div>
                  
                  <div class="room-wrap d-md-flex ftco-animate" style="--61b7e5a8: 99999999; --61b0a037: 220px; --8ad72654: 373.890625px; margin-bottom: 20px;">
                      <a href="#" class="img" style="background-image: url('{{ asset('images/room-2.jpg') }}'); width: 50%; height: 0; padding-bottom: 50%; background-size: cover; background-position: center;"></a>
                      <div class="half left-arrow d-flex align-items-center" style="width: 50%;">
                          <div class="text p-4 text-right"> <!-- Mengubah text-center menjadi text-right -->
                              <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                              <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
                              <h3 class="mb-3"><a href="rooms.html">Family Room</a></h3>
                              <p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                              <p class="pt-1">
                                  <a href="room-single.html" class="btn-custom px-3 py-2 rounded" style="display: inline-block; border: 1px solid #000; padding: 10px 20px; text-align: center;">
                                      Book Now <span class="icon-long-arrow-right"></span>
                                  </a>
                              </p>
                          </div>
                      </div>
                  </div>
                  
                  <div class="room-wrap d-md-flex ftco-animate" style="--61b7e5a8: 99999999; --61b0a037: 220px; --8ad72654: 373.890625px; margin-bottom: 20px;">
                      <a href="#" class="img" style="background-image: url('{{ asset('images/room-3.jpg') }}'); width: 50%; height: 0; padding-bottom: 50%; background-size: cover; background-position: center;"></a>
                      <div class="half left-arrow d-flex align-items-center" style="width: 50%;">
                          <div class="text p-4 text-right"> <!-- Mengubah text-center menjadi text-right -->
                              <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                              <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
                              <h3 class="mb-3"><a href="rooms.html">Deluxe Room</a></h3>
                              <p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                              <p class="pt-1">
                                  <a href="room-single.html" class="btn-custom px-3 py-2 rounded" style="display: inline-block; border: 1px solid #000; padding: 10px 20px; text-align: center;">
                                      Book Now <span class="icon-long-arrow-right"></span>
                                  </a>
                              </p>
                          </div>
                      </div>
                  </div>
                  
                  <div class="room-wrap d-md-flex ftco-animate" style="--61b7e5a8: 99999999; --61b0a037: 220px; --8ad72654: 373.890625px; margin-bottom: 20px;">
                    <a href="#" class="img" style="background-image: url('{{ asset('images/room-4.jpg') }}'); width: 50%; height: 0; padding-bottom: 50%; background-size: cover; background-position: center;"></a>
                    <div class="half left-arrow d-flex align-items-center" style="width: 50%;">
                        <div class="text p-4 text-right"> <!-- Mengubah text-center menjadi text-right -->
                            <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                            <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
                            <h3 class="mb-3"><a href="rooms.html">Luxury Room</a></h3>
                            <p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                            <p class="pt-1">
                                <a href="room-single.html" class="btn-custom px-3 py-2 rounded" style="display: inline-block; border: 1px solid #000; padding: 10px 20px; text-align: center;">
                                    Book Now <span class="icon-long-arrow-right"></span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
             
                <div class="room-wrap d-md-flex ftco-animate" style="--61b7e5a8: 99999999; --61b0a037: 220px; --8ad72654: 373.890625px; margin-bottom: 20px;">
                  <a href="#" class="img" style="background-image: url('{{ asset('images/room-5.jpg') }}'); width: 50%; height: 0; padding-bottom: 50%; background-size: cover; background-position: center;"></a>
                  <div class="half left-arrow d-flex align-items-center" style="width: 50%;">
                      <div class="text p-4 text-right"> <!-- Mengubah text-center menjadi text-right -->
                          <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                          <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
                          <h3 class="mb-3"><a href="rooms.html">Superior Room</a></h3>
                          <p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                          <p class="pt-1">
                              <a href="room-single.html" class="btn-custom px-3 py-2 rounded" style="display: inline-block; border: 1px solid #000; padding: 10px 20px; text-align: center;">
                                  Book Now <span class="icon-long-arrow-right"></span>
                              </a>
                          </p>
                      </div>
                  </div>
              </div>
               
                  
                    
                    {{-- <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button> --}}


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