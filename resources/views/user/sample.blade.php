<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penginapan Terdekat</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <style>
        .location {
            color: blue;
            font-size: 0.8rem;
        }

        .view-details-btn {
            display: inline-block;
            margin-top: 10px;
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

        .room-wrap {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .room-wrap .img {
            flex-shrink: 0;
            width: 200px;
            height: 200px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            margin-right: 20px;
        }

        .room-wrap .img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .room-wrap .text {
            flex-grow: 1;
        }

        .room-wrap .text h3 {
            margin-bottom: 10px;
        }

        .room-wrap .text .price {
            font-weight: bold;
        }

        .room-wrap .text .location {
            margin-top: 5px;
        }

        .room-wrap .text .view-details-btn,
        .room-wrap .text .book-now-btn {
            margin-top: 10px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-6 {
            width: 50%;
            padding: 10px;
        }

        @media (max-width: 768px) {
            .col-md-6 {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card" style="margin-top: 40px;">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Penginapan Terdekat</h5>

                    <div class="row">
                        @foreach ($penginapans as $index => $penginapan)
                            <div class="col-md-6" style="margin-bottom: 20px;">
                                <div class="room-wrap d-flex ftco-animate">
                                    <a href="#" class="img" style="background-image: url('{{ asset($penginapan->image_url) }}');">
                                        <img src="{{ asset($penginapan->image_url) }}">
                                    </a>
                                    <div class="text">
                                        <p class="star mb-0">
                                            @for ($i = 0; $i < 5; $i++)
                                                <span class="ion-ios-star"></span>
                                            @endfor
                                        </p>
                                        <h3 class="mb-3"><a href="rooms.html">{{ $penginapan->name }}</a></h3>
                                        <p class="location mb-0"><small>{{ $penginapan->location }}</small></p>

                                        <p class="mb-0">
                                            <span class="price mr-1">Rp {{ number_format($penginapan->price, 0, ',', '.') }}</span>
                                            <span class="per">per night</span>
                                        </p>

                                        <p class="view-details-btn">
                                            <a href="{{ route('penginapan.detail', ['name' => $penginapan->name]) }}" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a>
                                        </p>
                                        <p class="pt-1">
                                            <a href="{{ route('penginapan.show', $penginapan->name) }}" class="book-now-btn">
                                                Book Now <span class="icon-long-arrow-right"></span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            @if (($index + 1) % 2 == 0)
                                </div><div class="row">
                            @endif
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $penginapans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
</body>
</html>
