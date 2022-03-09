<nav class="navbar navbar-expand-sm navbar-light bg-white py-sm-1">
    <a class="navbar-brand " href="{{ url('/') }}">
        <img src="/logo.png" class="adminlogo" alt="vamble logo">
    </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 d-sm-none">
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

        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 align-items-center">
            <li class="mr-4 position-relative">

                <a id="notification" class="nav-link " href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    <div class="position-relative">
                        <span><i class="fa fa-bullhorn nav-icon" aria-hidden="true"></i></span>
                        @if ( Auth::user()->unreadnotifications->count() )
                            <span class="badge badge-danger notification_badge">
                            {{ Auth::user()->unreadnotifications->count() }}</span>
                        @endif

                    </div>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notification">
                    <div class="note-body  py-3">
                        <h6 class="mb-2  font-weight-bold text-left px-2"> Notifications</h6>
                        <hr>
                       @if (Auth::user()->unreadnotifications->count())
                            @foreach (Auth::user()->unreadnotifications as $notification)
                            <div class="dropdown-item py-2 border-bottom ">
                                @if (!$notification->read_at)
                                   <a href="{{ route('mark-notification', ['id' => $notification->id])}}" >

                                        <span class="font-weight-bold"> {{ $notification->data['body'] }}</span>
                                   </a>
                                @else()
                                    <span> {{ $notification->data['body'] }}</span>
                                @endif

                                <div class="text-right px-2 py-1">
                                   <small> {{ $notification->created_at }}</small>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <small class="text-center text-muted">No Unread notification</small>
                       @endif


                    </div>

                </div>
            </li>

            <li class="nav-item dropdown d-flex align-items-center">

                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    Hi {{ Auth::user()->name }}
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
        </ul>

    </div>
</nav>
