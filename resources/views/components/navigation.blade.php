  <nav class="navbar navbar-expand-md navbar-light  navigation initial_navigation" id="nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/logo.png" class="logo" alt="vamble logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                         <li class="nav-item ">
                                     <a class="nav-link " href="{{ route('about') }}">{{ __('About us') }}</a>
                                </li>
                               <li class="nav-item">
                                     <a class="nav-link" href="{{ route('services') }}">{{ __('Services') }}</a>
                                </li>
                                <li class="nav-item">

                                     <a class="nav-link" href="{{ route('gallery') }}">{{ __('Gallery') }}</a>
                                </li>
                                 <li class="nav-item">

                                     <a class="nav-link" href="{{ route('accomodations') }}">{{ __('Apartments & Suites') }}</a>
                                </li>
                                 <li class="nav-item">

                                     <a class="nav-link" href="{{ route('contact') }}">{{ __('Reach out ') }}</a>
                                </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto align-items-center">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            <li class="nav-item">

                                     <a class="nav-link" href="{{ route('booking') }}">
                                    <button type="button" class="btn btn-primary ">{{ __('Book now') }}</button>

                                    </a>
                                </li>

                    </ul>
                </div>
            </div>
        </nav>
