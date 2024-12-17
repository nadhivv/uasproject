{{-- @extends('user.layout.main')

@section('content')
<div class="container">
    <h2 class="mb-4">Pencarian Lokasi Penginapan</h2>
    <hr>

    <form action="{{ route('lokasi.cari') }}" method="GET">
        <div class="row">
            <!-- Dropdown Kota -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <select name="kota" id="kota" class="form-control">
                        <option value="">Pilih Kota</option>
                        @foreach($kota as $key => $value)
                            <option value="{{ $value }}" @if(request('kota') == $value) selected @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Dropdown Provinsi -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control">
                        <option value="">Pilih Provinsi</option>
                        @foreach($provinsi as $value)
                            <option value="{{ $value }}" @if(request('provinsi') == $value) selected @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <hr>

    <h4>Hasil Pencarian</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Kota</th>
                <th>Provinsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lokasi as $l)
                <tr>
                    <td>{{ $l->nama_kota }}</td>
                    <td>{{ $l->provinsi }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Tidak ada hasil ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection --}}
