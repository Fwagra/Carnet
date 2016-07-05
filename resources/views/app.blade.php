<!DOCTYPE html>
<html lang="{{ env('APP_LANG', 'en')}}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Carnet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class="mdl-layout mdl-js-layout">
        <header class="mdl-layout__header"></header>
        <div class="mdl-layout__content">
            @yield('content')
        </div>
        <footer class="mdl-layout__footer">
            @yield('footer')
        </footer>
    </div>
    @if(Session::has('error'))
           {{ Toastr::error(Session::get('error')) }}
    @endif
    @if(Session::has('message'))
           {{ Toastr::success(Session::get('message')) }}
    @endif
    <script src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
