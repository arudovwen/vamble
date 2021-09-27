<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
    <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">


        <div class="container-fluid overflow-hidden" style="height: 100vh">
            <div class="row">
                <div class="col-xs-12 col-sm-2  px-0">
                    <x-sidebar></x-sidebar>
                </div>
                <div class="col-xs-12 col-sm-10 p-0">
                    <x-adminnav></x-adminnav>
                    <main class="admincontent p-3 ">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>



    </div>


</body>

</html>
