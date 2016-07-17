<html lang="{{ env('APP_LANG', 'en')}}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Carnet</title>
    <script src="{{ URL::asset('js/polyfill.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/dialog-polyfill.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class="mdl-layout mdl-js-layout has-drawer">
        <div class="mdl-layout__drawer">
            @include('layouts.menu')
        </div>
        <div class="mdl-layout__content main_content">
            @yield('content')
        </div>
        <footer class="mdl-layout__footer">
            @yield('footer')
        </footer>
    </div>
    <script src="{{ URL::asset('js/app.js') }}"></script>
    {!! Toastr::render() !!}
</body>
</html>
