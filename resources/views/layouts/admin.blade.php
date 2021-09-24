<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ mix('/js/app.js') }}" defer></script>
    <script src="/js/admin.js" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">


        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-2  px-0">
                    <x-sidebar></x-sidebar>
                </div>
                <div class="col-xs-12 col-sm-10">
                    <main class="maincontent">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>



    </div>


    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
        const chart = new Chartisan({
            el: '#charter',
            url: "@chart('sample_chart')",
        });
    </script>

</body>

</html>
