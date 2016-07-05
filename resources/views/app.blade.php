<!DOCTYPE html>
<html lang="{{ env('APP_LANG', 'en')}}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Carnet</title>
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

    @if(Session::has('error'))
           {{ Toastr::error(Session::get('error')) }}
    @endif
    @if(Session::has('message'))
           {{ Toastr::success(Session::get('message')) }}
    @endif
    <script src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
