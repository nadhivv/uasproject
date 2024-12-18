@extends('user.layout.main')

@section('content')

<div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">Rekomendasi Terbaik Kami</span>
        <h2>Hasil Pencarian Penginapan</h2>
    </div>
</div>

<div class="container mt-4">

        <!-- Penginapan List Section -->
        <div class="col-md-9">
            <div class="row">
                @forelse ($penginapans as $penginapan)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ $penginapan->image_url ?? 'https://via.placeholder.com/300x200' }}"
                                class="card-img-top" alt="{{ $penginapan->name }}">
                            <div class="card-body">
                                <h5 class="card-title mb-2">{{ $penginapan->name }}</h5>
                                <p class="card-text text-muted">
                                    {{ Str::limit($penginapan->description, 100) }}
                                </p>
                                <p class="mb-1"><strong>Lokasi:</strong> {{ $penginapan->location }}</p>
                                <p class="mb-1"><strong>Harga:</strong> Rp {{ number_format($penginapan->price, 0, ',', '.') }}</p>
                                <p class="mb-1"><strong>Rating:</strong> {{ $penginapan->rating }} / 10</p>

                                <!-- Badges -->
                                <div>
                                    @if ($penginapan->rating >= 9)
                                        <span class="badge bg-success">Luar Biasa</span>
                                    @elseif ($penginapan->rating >= 8)
                                        <span class="badge bg-primary">Istimewa</span>
                                    @elseif ($penginapan->rating >= 7)
                                        <span class="badge bg-info">Sangat Bagus</span>
                                    @else
                                        <span class="badge bg-secondary">Bagus</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">Tidak ada penginapan yang sesuai dengan pencarian Anda.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            {{-- <div class="d-flex justify-content-center mt-4">
                {{ $penginapans->links() }}
            </div> --}}
        </div>
</div>

@endsection
