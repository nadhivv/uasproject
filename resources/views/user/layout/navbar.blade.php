<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Stay<span>Nest</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="" class="nav-link">Our Rooms</a></li>
          {{-- <li class="nav-item"><a href="{{ route('lokasi.cari') }}" class="nav-link">Nearby</a></li> --}}
          <li class="nav-item"><a href="" class="nav-link">Blog</a></li>
          <form action="{{ route('logout') }}" method="POST" class="form-inline my-0">
                @csrf
                <button type="submit" class="btn btn-light px-4 py-2"
                    style="border-radius: 20px; font-size: 1rem;">
                    Logout
                </button>
            </form>
        </ul>
      </div>
    </div>
  </nav>
