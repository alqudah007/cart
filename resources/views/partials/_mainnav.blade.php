
<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top mb-5">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                {{--always show menu--}}
                <li class="nav-item ">
                    <a class="nav-link btn" href="/cart">
                        {{__('Cart index')}}
                        |
                        <span class="badge badge-pill badge-danger text-white">
                        {{ Session::has('cart') ? count(Session::get('cart'))-1  : 0 }}
                       </span>
                        |
                        <span class="badge badge-pill badge-success text-white">
                         @if (Session::has('cart') && ! empty(Session::get('cart')))
                             {{Session::get('cart')['total']}} $
                             @else
                             {{"0.0 $"}}

                         @endif

                         {{-- {{ Session::has('cart') ? Session::get('cart')['total'] : "0.0 $"}}--}}
                       </span>
                    </a>



                </li>


                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        cart mangment
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('cart.clear')}}">
                            {{ __('cart clear') }}
                        </a>

                        <a class="dropdown-item" href="{{route('cart.dump')}}">
                            {{ __('cart dump') }}
                        </a>


                    </div>
                </li>


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
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/">
                                {{ __('home') }}
                            </a>

                            <a class="dropdown-item" href="/home">
                                {{ __('dashboard') }}
                            </a>


                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


