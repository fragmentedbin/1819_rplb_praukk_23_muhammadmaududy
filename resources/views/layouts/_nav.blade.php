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
<div class="nav-c">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a href="/" class="navbar-brand">
            <img src="{{asset('img/logo-inventory.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1>
            {{-- {{ Auth::user()->nama_user }} --}}
        </h1>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item  @if (Route::current()->getName() === 'inventaris') nav-active @endif">
                    <a class="nav-link   @if (Route::current()->getName() === 'inventaris') active @endif"
                        href="/">inventaris</a>
                </li>
                <li class="nav-item @if (Route::current()->getName() === 'pinjaman') nav-active @endif">
                    <a class="nav-link @if (Route::current()->getName() === 'pinjaman') active @endif "
                        href="/pinjaman">pinjaman</a>
                </li>
                <li class="nav-item @if (Route::current()->getName() === 'ruangan') nav-active @endif">
                    <a class="nav-link @if (Route::current()->getName() === 'ruangan') active @endif "
                        href="/ruangan">ruangan</a>
                </li>
                @can('only-admin')
                <li class="nav-item @if (Route::current()->getName() === 'user_set') nav-active @endif" >
                    <a class="nav-link @if (Route::current()->getName() === 'user_set') active @endif" style="color: rgb(255, 73, 73);" 
                        href="/user_set">User-setting</a>
                </li>
                @endcan
            </ul>


            {{--  --}}
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>