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
                              <span class="nav-text"> +2349064645461</span></a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link " href="#"> <i class="fa fa-envelope text-primary"
                                  aria-hidden="true"></i> <span class="nav-text">
                                  contact@vambleapartments.com</span></a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link " href="https://goo.gl/maps/AKGfNTN9frUpyWHU8">
                              <i class="fas fa-map-pin  text-primary" aria-hidden="true"></i>

                              <span class="nav-text">Plot 790, sector center, Cadastral zone. Jahi. Abuja</span>
                          </a>
                      </li>
                      <li class="nav-item d-flex align-items-center">

                     <a href="http://instagram.com/vambleapartments" target="_blank"> <span class="">
                          <i class="fab fa-instagram text-primary mr-2" aria-hidden="true"></i>

                      </span></a>
                     <a href="http://wa.me/2349064645461"> <span ><i class="fab fa-whatsapp mr-2 text-primary" aria-hidden="true"></i>
                      </span></a>
                      <span > <i class="fab fa-twitter text-primary" aria-hidden="true"></i></span>

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
                              href="{{ route('accomodations') }}">{{ __('Rooms & Apartments ') }}</a>
                      </li>
                      <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">

                          <a class="nav-link" href="{{ route('contact') }}">{{ __('Make Enquiries') }}</a>
                      </li>
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto align-items-center ">

                      <!-- Authentication Links -->
                      @guest
                          @if (Route::has('login'))
                             
                          @endif


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
                                  class="btn btn-primary btn-sm nav-btn">{{ __('Make a reservation') }}</button>

                          </a>
                      </li>

                  </ul>


              </div>
          </div>
      </div>
  </nav>
