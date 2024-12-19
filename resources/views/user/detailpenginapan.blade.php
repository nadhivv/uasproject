<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Penginapan</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <style>
        .larger-title {
            font-size: 2.5rem; /* Sesuaikan dengan ukuran yang diinginkan */
        }
        .location {
            color: blue;
            font-size: 0.8rem;
        }
        .book-now-btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .book-now-btn:hover {
            background-color: #0056b3;
            text-decoration: none;
        }
        .star-rating span {
            color: gold;
            font-size: 1.2rem;
        }
        .review-section {
            margin-top: 40px;
        }
        .review-form textarea {
            resize: none;
        }
        /* Menambahkan sedikit ruang di sekitar foto dan peta */
        .photo-map-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .photo-map-container .map-container,
        .photo-map-container .photo-container {
            width: 48%;
            height: 300px; /* Sesuaikan dengan tinggi yang diinginkan */
            border-radius: 8px;
            overflow: hidden;
        }
        .photo-map-container iframe {
            width: 100%;
            height: 100%; /* Sesuaikan tinggi iframe dengan kontainer */
            border: none;
        }
        .photo-map-container img {
            width: 100%;
            height: 100%; /* Gambar juga harus menyesuaikan tinggi dan lebar */
            object-fit: cover; /* Agar gambar tidak terdistorsi */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <div class="card" style="margin-top: 40px;">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4 larger-title">{{ $penginapan->name }}</h5>
                    <!-- Foto dan Google Maps bersebelahan -->
                    <div class="photo-map-container mt-4">
                        <div class="map-container">
                            <h6>Lokasi di Peta:</h6>
                            <iframe src="https://www.google.com/maps?q={{ urlencode($penginapan->location) }}&output=embed"></iframe>
                        </div>
                        <div class="photo-container">
                            <h6>Foto Penginapan:</h6>
                            <img src="{{ asset($penginapan->image_url) }}" alt="Gambar Penginapan">
                        </div>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <h>Lokasi:</h5>
                        <p class="location">{{ $penginapan->location }}</p>
                        <h5>Harga per malam:</h5>
                        <p>Rp {{ number_format($penginapan->price, 0, ',', '.') }}</p>
                    </div>

                    <!-- Review Section -->
                    <div class="review-section">
                        <h5>Review Pengunjung</h5>
                        @foreach ($penginapan->reviews as $review)
                            <div class="review mb-3">
                                <strong>{{ $review->user->name }}:</strong>
                                <p>{{ $review->comment }}</p>
                                <div class="star-rating">
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <span class="ion-ios-star"></span>
                                    @endfor
                                </div>
                                <hr>
                            </div>
                        @endforeach

                        <!-- Review Form -->
                        <h5>Tambah Review</h5>
                        <form method="POST" action="{{ route('penginapan.addReview', $penginapan->id) }}" class="review-form">
                            @csrf
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <select name="rating" id="rating" class="form-control">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                            <a href="{{ route('cari.penginapan') }}" class="btn btn-primary">
                                Back <span class="icon-long-arrow-right"></span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Flash Message -->
    @if (session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
