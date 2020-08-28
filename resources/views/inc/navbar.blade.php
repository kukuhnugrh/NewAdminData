<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
  <a class="navbar-brand" href="/">Penjadwalan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/tambah-acara">Tambah Acara <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/tambah-subacara">Tambah Kelas Acara <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/input-peserta">Tambah Peserta <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/pilih-presensi-acara">Presensi<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/change-password">Security <span class="sr-only">(current)</span></a>
      </li>


    </ul>
    <form class="form-inline my-2 my-lg-0">
      @guest
      <li class="nav-item active">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }} <span class="sr-only">(current)</span></a>
      </li>
<!--       <li class="nav-item active">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }} <span class="sr-only">(current)</span></a>
      </li>  -->     
      @else
      <div>
        <p style="color:white;">{{auth()->user()->username}}</p>
        <a href="{{ route('logout') }}">
            {{ __('Logout') }}
        </a>
      </div>
      @endguest
    </form>
  </div>
</nav>