<div class="sidebar d-none d-sm-block">
    <div class="logocontainer mb-0 mb-sm-4">
        <a class="" href=" {{ url('/') }}">
            <img src="/logo.png" class="adminlogo" alt="vamble logo">
        </a>

        <button class="navbar-toggler" type="button" aria-controls="navbarTogglerDemo01" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <nav>

        <ul class="d-none d-sm-block">
            <li class=" {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                <a href="{{ route('dashboard') }}">
                    <div class="w-100 d-flex justify-content-between align-items-center"><span>
                            <i class="fa fa-tachometer-alt mr-2" aria-hidden="true"></i>
                            {{ __('Dashboard') }} </span>
                        @if (request()->routeIs('dashboard'))
                            <i class="fa fa-caret-left ml-auto" aria-hidden="true"></i>
                        @endif

                    </div>
                </a>

            </li>
            <li class=" {{ request()->routeIs('reservations') ? 'active' : '' }}">

                <a href="{{ route('reservations') }}">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <span> <i class="fa fa-list-alt mr-2" aria-hidden="true"></i>
                            {{ __('Reservations') }}</span>
                        @if (request()->routeIs('reservations'))
                            <i class="fa fa-caret-left ml-auto" aria-hidden="true"></i>
                        @endif
                    </div>
                </a>

            </li>
            <li class=" {{ request()->routeIs('users') ? 'active' : '' }}">


                <a href="{{ route('users') }}">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <span> <i class="fa fa-users mr-2" aria-hidden="true"></i>
                            {{ __('User management') }}</span>
                        @if (request()->routeIs('users'))
                            <i class="fa fa-caret-left ml-auto" aria-hidden="true"></i>
                        @endif
                    </div>
                </a>

            </li>
            <li class=" {{ request()->routeIs('transactions') ? 'active' : '' }}">
                <a href="{{ route('transactions') }}">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <span><i class="fa fa-credit-card mr-2" aria-hidden="true"></i>
                            {{ __('Transactions') }}</span>
                        @if (request()->routeIs('transactions'))
                            <i class="fa fa-caret-left ml-auto" aria-hidden="true"></i>
                        @endif
                    </div>
                </a>
            </li>
            <li class=" {{ request()->routeIs('rooms') ? 'active' : '' }}">
                <a href="{{ route('rooms') }}">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <span> <i class="fa fa-bed mr-2" aria-hidden="true"></i>
                            {{ __('Rooms') }}</span>
                        @if (request()->routeIs('rooms'))
                            <i class="fa fa-caret-left ml-auto" aria-hidden="true"></i>
                        @endif
                    </div>
                </a>
            </li>
            <li class=" {{ request()->routeIs('calendar') ? 'active' : '' }}">
                <a href="{{ route('calendar') }}">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <span><i class="fa fa-calendar mr-2" aria-hidden="true"></i> {{ __('Calendar') }}</span>
                        @if (request()->routeIs('calendar'))
                            <i class="fa fa-caret-left ml-auto" aria-hidden="true"></i>
                        @endif
                    </div>
                </a>
            </li>
            <li class=" {{ request()->routeIs('roomsearch') ? 'active' : '' }}">
                <a href="{{ route('roomsearch') }}">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <span> <i class="fa fa-search mr-2" aria-hidden="true"></i> {{ __('Search room') }}</span>
                        @if (request()->routeIs('roomsearch'))
                            <i class="fa fa-caret-left ml-auto" aria-hidden="true"></i>
                        @endif
                    </div>
                </a>
            </li>
            <li>

                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <div>
                        <span>
                            <i class="fas fa-sign-out-alt   mr-2 "></i>
                            {{ __('Logout') }}</span>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
    </nav>
</div>
