@extends('user.layout.main')

@section('content')

		<div class="hero">
	    <section class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url('{{ asset('images/bg_1.jpg') }}');">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-end">
	          <div class="col-md-6 ftco-animate">
	          	<div class="text">
	          		<h2>More than a homestay... an experience</h2>
		            <h1 class="mb-3">Homestay for the whole family, all year round.</h1>
	            </div>
	          </div>
	        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url('{{ asset('images/bg_1.jpg') }}');">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-end">
	          <div class="col-md-6 ftco-animate">
	          	<div class="text">
	          		<h2>StayNest Homestay &amp; Resort</h2>
		            <h1 class="mb-3">It feels like staying in your own home.</h1>
	            </div>
	          </div>
	        </div>
	        </div>
	      </div>
	    </section>
	  </div>

	  <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <form action="{{ url('/user/sample') }}" class="booking-form aside-stretch">
                        <div class="row">
                            <!-- Check-in Date -->
                            <div class="col-md-3 py-md-3">
                                <div class="form-group align-self-stretch">
                                    <div class="wrap align-self-stretch py-3 px-3">
                                        <label for="checkin_date" class="mb-2">Check-in Date</label>
                                        <input type="date" name="checkin_date" id="checkin_date" class="form-control" placeholder="Check-in date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 py-md-3">
                                <div class="form-group align-self-stretch">
                                    <div class="wrap align-self-stretch py-3 px-3">
                                        <label for="checkout_date" class="mb-2">Check-out Date</label>
                                        <input type="date" name="checkout_date" id="checkout_date" class="form-control" placeholder="Check-out date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 py-md-3">
                                <div class="form-group align-self-stretch">
                                    <div class="wrap align-self-stretch py-3 px-3">
                                        <label for="provinsi" class="mb-2">Provinsi</label>
                                        <select name="provinsi" id="provinsi" class="form-control" required>
                                            <option value="">Pilih</option>
                                            <option value="Jawa Timur">Jawa Timur</option>
                                            <option value="Jawa Barat">Jawa Barat</option>
                                            <option value="Jawa Tengah">Jawa Tengah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 py-md-3">
                                <div class="form-group align-self-stretch">
                                    <div class="wrap align-self-stretch py-3 px-3">
                                        <label for="kota" class="mb-2">Kota</label>
                                        <select name="kota" id="kota" class="form-control" required>
                                            <option value="">Pilih</option>
                                            <option value="Surabaya">Surabaya</option>
                                            <option value="Bandung">Bandung</option>
                                            <option value="Semarang">Semarang</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 py-md-3">
                                <div class="form-group align-self-stretch">
                                    <div class="wrap align-self-stretch py-3 px-3">
                                        <label for="guests" class="mb-2">Guests</label>
                                        <select name="guests" id="guests" class="form-control" required>
                                            <option value="1">1 Adult</option>
                                            <option value="2">2 Adults</option>
                                            <option value="3">3 Adults</option>
                                            <option value="4">4 Adults</option>
                                            <option value="5">5 Adults</option>
                                            <option value="6">6 Adults</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center py-md-3">
                                <div class="form-group" style="width: 30%;">
                                    <button type="submit" class="btn btn-primary py-4 px-5 w-200 text-center">
                                        <span>Check Availability <small>Best Price Guaranteed!</small></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



	<section class="ftco-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Welcome to StayNest Homestay</span>
            <h2 class="mb-4">You'll Never Want To Leave</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-reception-bell"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">
                    <a href="#laundry" >Pesan Laundry</a>
                </h3>
              </div>
            </div>
          </div>
          <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services active py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-serving-dish"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">
                    <a href="#makanan" >Pesan Makanan</a>
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-wrap-about ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-7 order-md-last d-flex">
						<div class="img img-1 mr-md-2 ftco-animate" style="background-image: url('{{ asset('images/surabaya2.webp') }}');"></div>
						<div class="img img-2 ml-md-2 ftco-animate" style="background-image: url('{{ asset('images/bandung3.webp') }}');"></div>
					</div>
					<div class="col-md-5 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
	          <div class="heading-section mb-4 my-5 my-md-0">
	          	<span class="subheading">About StayNest</span>
	            <h2 class="mb-4">StayNest the Most Recommended Homestay All Over the World</h2>
	          </div>
	          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
	          <p><a href="#" class="btn btn-secondary rounded">Reserve Your Room Now</a></p>
					</div>
				</div>
			</div>
		</section>

    <section class="testimony-section">
      <div class="container">
        <div class="row no-gutters ftco-animate justify-content-center">
        	<div class="col-md-5 d-flex">
        		<div class="testimony-img aside-stretch-2" style="background-image: url('{{ asset('images/bandung4.webp') }}');"></div>
        	</div>
          <div class="col-md-7 py-5 pl-md-5">
          	<div class="py-md-5">
	          	<div class="heading-section ftco-animate mb-4">
	          		<span class="subheading">Testimony</span>
			          <h2 class="mb-0">Happy Customer</h2>
			        </div>
	            <div class="carousel-testimony owl-carousel ftco-animate">
	              <div class="item">
	                <div class="testimony-wrap pb-4">
	                  <div class="text">
	                    <p class="mb-4">Sangat sederhana namun nyaman dan ramah untuk anak-anak, sejuk, dan adem.</p>
	                  </div>
	                  <div class="d-flex">
		                  <div class="user-img" style="background-image: url('{{ asset('images/person_1.jpg') }}');">
		                  </div>
		                  <div class="pos ml-3">
		                  	<p class="name">Budi Triono</p>
		                    <span class="position">Businessman</span>
		                  </div>
		                </div>
	                </div>
	              </div>
	              <div class="item">
	                <div class="testimony-wrap pb-4">
	                  <div class="text">
	                    <p class="mb-4">Suasana sangat nyaman, asri, sejuk, dan menyenangkan untuk disinggahi sesaat.</p>
	                  </div>
	                  <div class="d-flex">
		                  <div class="user-img" style="background-image: url('{{ asset('images/person_5.jpg') }}');">
		                  </div>
		                  <div class="pos ml-3">
		                  	<p class="name">Citra Ayu</p>
		                    <span class="position">Housewife</span>
		                  </div>
		                </div>
	                </div>
	              </div>
	              <div class="item">
	                <div class="testimony-wrap pb-4">
	                  <div class="text">
	                    <p class="mb-4">Rumah yg nyaman untuk bersantai sejenak bersama keluarga.</p>
	                  </div>
	                  <div class="d-flex">
		                  <div class="user-img" style="background-image: url('{{ asset('images/person_2.jpg') }}');">
		                  </div>
		                  <div class="pos ml-3">
		                  	<p class="name">Bambang</p>
		                    <span class="position">Programmer</span>
		                  </div>
		                </div>
	                </div>
	              </div>
	              <div class="item">
	                <div class="testimony-wrap pb-4">
	                  <div class="text">
	                    <p class="mb-4">Cocok untuk singgah sementara karena seperti rumah sendiri.</p>
	                  </div>
	                  <div class="d-flex">
		                  <div class="user-img" style="background-image: url('{{ asset('images/person_6.jpg') }}');">
		                  </div>
		                  <div class="pos ml-3">
		                  	<p class="name">Gracia</p>
		                    <span class="position">Corporate</span>
		                  </div>
		                </div>
	                </div>
	              </div>
	            </div>
	          </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-room">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">StayNest Rooms</span>
            <h2 class="mb-4">Homestay Master's Rooms</h2>
          </div>
        </div>
    		<div class="row no-gutters">
    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex ftco-animate">
    					<a href="#" class="img" style="background-image: url('{{ asset('images/surabaya2.webp') }}');"></a>
    					<div class="half left-arrow d-flex align-items-center">
    						<div class="text p-4 text-center">
    							<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">Rp.600.000</span> <span class="per">per malam</span></p>
	    						<h3 class="mb-3"><a href="rooms.html">House of Dharmawan</a></h3>
	    						<p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex ftco-animate">
    					<a href="#" class="img" style="background-image: url('{{ asset('images/bandung3.webp') }}');"></a>
    					<div class="half left-arrow d-flex align-items-center">
    						<div class="text p-4 text-center">
    							<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">Rp.600.000</span> <span class="per">per malam</span></p>
	    						<h3 class="mb-3"><a href="rooms.html">La Grande by Djitu Hospitality</a></h3>
	    						<p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
    			</div>

    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex ftco-animate">
    					<a href="#" class="img order-md-last" style="background-image: url('{{ asset('images/bandung5.webp') }}');"></a>
    					<div class="half right-arrow d-flex align-items-center">
    						<div class="text p-4 text-center">
    							<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">Rp.900.000</span> <span class="per">per malam</span></p>
	    						<h3 class="mb-3"><a href="rooms.html">Uma Gati</a></h3>
	    						<p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex ftco-animate">
    					<a href="#" class="img order-md-last" style="background-image: url('{{ asset('images/rumahkertajaya.webp') }}');"></a>
    					<div class="half right-arrow d-flex align-items-center">
    						<div class="text p-4 text-center">
    							<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">Rp.500.000</span> <span class="per">per malam</span></p>
	    						<h3 class="mb-3"><a href="rooms.html">Rumah Kertajaya</a></h3>
	    						<p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
    			</div>

    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex ftco-animate">
    					<a href="#" class="img" style="background-image: url('{{ asset('images/bandung2.webp') }}');"></a>
    					<div class="half left-arrow d-flex align-items-center">
    						<div class="text p-4 text-center">
    							<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">Rp.700.000</span> <span class="per">per malam</span></p>
	    						<h3 class="mb-3"><a href="rooms.html">The W Avenue</a></h3>
	    						<p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex ftco-animate">
    					<a href="#" class="img" style="background-image: url('{{ asset('images/surabaya3.webp') }}');"></a>
    					<div class="half left-arrow d-flex align-items-center">
    						<div class="text p-4 text-center">
    							<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">Rp.850.000</span> <span class="per">per malam</span></p>
	    						<h3 class="mb-3"><a href="rooms.html">Home Guesthouse</a></h3>
	    						<p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>


	<section id="laundry" class="ftco-section ftco-menu bg-light">
        <div class="container-fluid px-md-4">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Laundry</span>
                    <h2>Pesan Laundry</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-xl-6 d-flex">
                    <div class="pricing-entry rounded d-flex ftco-animate">
                        <div class="desc p-4">
                            <form action="" method="POST">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="jenis_laundry">Jenis Layanan</label>
                                    <select id="jenis_laundry" name="jenis_laundry" class="form-control" onchange="updatePrice()">
                                        <option value="cuci_kering" data-price="20000">Cuci Kering</option>
                                        <option value="cuci_setrika" data-price="30000">Cuci + Setrika</option>
                                        <option value="setrika" data-price="15000">Setrika Saja</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah Laundry (Kg/Item)</label>
                                    <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Masukkan jumlah" oninput="updatePrice()">
                                </div>
                                <div class="form-group">
                                    <label for="waktu_pengambilan">Waktu Pengambilan</label>
                                    <input type="datetime-local" id="waktu_pengambilan" name="waktu_pengambilan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="waktu_pengembalian">Estimasi Waktu Pengembalian</label>
                                    <input type="datetime-local" id="waktu_pengembalian" name="waktu_pengembalian" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Total Harga</label>
                                    <input type="text" id="harga" name="harga" class="form-control" value="Rp 0" readonly>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary rounded">Pesan Sekarang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 d-flex">
                    <div class="pricing-entry rounded d-flex ftco-animate">
                        <div class="desc p-4">
                            <h4>Status Pemesanan Laundry</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Layanan</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>12 Desember 2024</td>
                                        <td>Cuci Kering</td>
                                        <td>5 Kg</td>
                                        <td>Diproses</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>


    <section id="makanan" class="ftco-section ftco-menu bg-light">
        <div class="container-fluid px-md-4">
            <!-- Header Section -->
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Makanan</span>
                    <h2>Pesan Makanan</h2>
                </div>
            </div>
            <!-- Menu Section -->
            <div class="row">
                @foreach ($makanan as $item)
                    <div class="col-lg-6 col-xl-4 d-flex">
                        <div class="pricing-entry rounded d-flex ftco-animate">
                            <div class="img" style="background-image: url({{ asset('storage/images/' . $item->photo) }});"></div>
                            <div class="desc p-4">
                                <div class="d-md-flex text align-items-start">
                                    <h3><span>{{ $item->nama_makanan }}</span></h3>
                                    <span class="price">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-block">
                                    <p>Nikmati hidangan yang menggugah selera anda selama menginap</p>
                                </div>
                                <div class="d-block mt-3">
                                    <a href="{{ route('pesan', $item->id) }}" class="btn btn-primary btn-sm rounded">Pesan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Read Review</span>
            <h2>Review & Ratings</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
                  <div><a href="#">Oct. 30, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
                  <div><a href="#">Oct. 30, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
                  <div><a href="#">Oct. 30, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="instagram">
      <div class="container-fluid">
        <div class="row no-gutters justify-content-center pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Photos</span>
            <h2><span>Instagram</span></h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-1.jpg" class="insta-img image-popup" style="background-image: url(images/insta-1.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-2.jpg" class="insta-img image-popup" style="background-image: url(images/insta-2.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-3.jpg" class="insta-img image-popup" style="background-image: url(images/insta-3.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-4.jpg" class="insta-img image-popup" style="background-image: url(images/insta-4.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-5.jpg" class="insta-img image-popup" style="background-image: url(images/insta-5.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
@endsection




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
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false') }}"></script>


  <script>
    function updatePrice() {
        const laundryType = document.getElementById('jenis_laundry');
        const selectedOption = laundryType.options[laundryType.selectedIndex];
        const pricePerUnit = parseFloat(selectedOption.getAttribute('data-price')) || 0;
        const quantity = parseFloat(document.getElementById('jumlah').value) || 0;
        const totalPrice = pricePerUnit * quantity;

        document.getElementById('harga').value = `Rp ${totalPrice.toLocaleString('id-ID')}`;
    }
</script>

    </body>
</html>


