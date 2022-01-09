  <nav class="navbar navbar-expand-lg navbar-light bg-white navigation default_navigation py-sm-0" id="nav">
      <div class="container-fluid align-items-sm-end px-sm-0">
          <a class="navbar-brand pt-sm-0" href="{{ url('/') }}">
              <img src="/logo.png" class="logo" alt="vamble logo">
          </a>

          <button class="navbar-toggler border-0 hamburger hamburger--spin" id="hamburger" type="button"
              data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
              aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
              </span>
          </button>

          <div class="nav-content">

              <div class="collapse navbar-collapse topnav">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item ">
                          <a class="nav-link " href="#"> <i class="fa fa-phone-square text-primary"
                                  aria-hidden="true"></i>
                              <span class="nav-text"> +234-906-464-5461</span></a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link " href="#"> <i class="fa fa-envelope text-primary"
                                  aria-hidden="true"></i> <span class="nav-text">
                                  vambleapartment@gmail.com</span></a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link " href="#">
                              <i class="fas fa-map-pin  text-primary" aria-hidden="true"></i>


                              <span class="nav-text">Plot 790, sector center, Cadastral zone. Jahi. Abuja</span>
                          </a>
                      </li>


                  </ul>


              </div>
              <hr class="border-primary d-none d-md-block my-0 ">
              <div class="collapse navbar-collapse bottom_nav" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav ">

                      <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                          <a class="nav-link " href="{{ route('home') }}">{{ __('Home') }}</a>
                      </li>
                      <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                          <a class="nav-link " href="{{ route('about') }}">{{ __('About us') }}</a>
                      </li>
                      <li class="nav-item {{ request()->routeIs('services') ? 'active' : '' }}">
                          <a class="nav-link" href="{{ route('services') }}">{{ __('Services') }}</a>
                      </li>
                      <li class="nav-item {{ request()->routeIs('gallery') ? 'active' : '' }}">

                          <a class="nav-link" href="{{ route('gallery') }}">{{ __('Gallery') }}</a>
                      </li>
                      <li class="nav-item {{ request()->routeIs('accomodations') ? 'active' : '' }}">

                          <a class="nav-link"
                              href="{{ route('accomodations') }}">{{ __('Apartments & Suites') }}</a>
                      </li>
                      <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">

                          <a class="nav-link" href="{{ route('contact') }}">{{ __('Make Enquiries') }}</a>
                      </li>
                  </ul>
                  <ul class="navbar-nav ml-auto align-items-center d-none d-md-flex">
                     <a href="http://instagram.com/vambleapartments" target="_blank"> <li class="nav-item">
                          <i class="fab fa-instagram text-primary mr-3" aria-hidden="true"></i>

                      </li></a>
                      <li class="nav-item"><i class="fab fa-facebook text-primary mr-3" aria-hidden="true"></i>
                      </li>
                      <li class="nav-item"> <i class="fab fa-twitter text-primary" aria-hidden="true"></i></li>
                  </ul>
                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto align-items-center ">

                      <!-- Authentication Links -->
                      @guest
                          @if (Route::has('login'))
                              <li class="nav-item mr-3">
                                  <a class="nav-link " href="{{ route('login') }}">
                                      {{ __('Login') }}
                                  </a>
                              </li>
                          @endif

                          {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('dashboard') }}">
                                      {{ __('Dashboard') }}
                                  </a>
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                 document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                      <li class="nav-item">

                          <a class="" href=" {{ route('booking') }}">
                              <button type="button"
                                  class="btn btn-primary btn-sm nav-btn">{{ __('Book online') }}</button>

                          </a>
                      </li>

                  </ul>


              </div>
          </div>
      </div>
  </nav>
