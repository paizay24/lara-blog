<nav class="navbar nav-pills navbar-expand-lg  navbar-light bg-light shadow-sm">
    <div class=" d-flex justify-content-around align-items-center">
        <div>
            <a class="navbar-brand" href="{{ route('home') }}">Lara Blog</a>
        </div>

        <div >
            <ul class="navbar-nav">
                <li class="nav-item">
                    <x-nav-link name="Home" url="{{ route('page.index') }}"></x-nav-link>
                 </li>

                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form></li>
                    </ul>
                </li>
                @else
                <li class="nav-item d-flex">
                    <x-nav-link name="Log In" url="{{ route('login') }}"></x-nav-link>
                    <x-nav-link name="Register" url="{{ route('register') }}"></x-nav-link>


                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
