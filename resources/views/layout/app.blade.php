<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    @yield('style')
    <title>@yield('title')</title>
</head>

<body>
    <div class="col-md-12 py-5" style="background-color: rgb(255, 123, 0);">
        <h1 class="text-light text-center">Flash News</h1>
        <p class="text-light text-center">Citizen Journalism</p>
    </div>
    <div class="container-fluid">
        @include('components.navbar')
        <div class="container">
            @include('components.alert')
        </div>
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.esm.min.js')}}"></script>
    @yield('script')
</body>

</html>
