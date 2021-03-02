{{-- <div class="sidebar">
    <div class="navbar-brand-c d-flex justify-content-center">
        <a href="">
            <img src="{{asset('img/logo-inventory.png')}}" alt="">
</a>
</div>
<ul class="navbar-nav">
    <li class="nav-item nav-active"><a class="nav-link" href="">inventaris</a></li>
    <li class="nav-item"><a class="nav-link" href="">pinjaman</a></li>
</ul>
</div> --}}
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a href="/" class="navbar-brand">
        <img src="{{asset('img/logo-inventory.png')}}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item  @if (Route::current()->getName() === 'inventaris') nav-active @endif">
                <a class="nav-link   @if (Route::current()->getName() === 'inventaris') active @endif" href="/">inventaris</a>
            </li>
            <li class="nav-item @if (Route::current()->getName() === 'pinjaman') nav-active @endif">
                <a class="nav-link @if (Route::current()->getName() === 'pinjaman') active @endif " href="pinjaman">pinjaman</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Ruangan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Petugas</a>
            </li>
        </ul>
    </div>
</nav>