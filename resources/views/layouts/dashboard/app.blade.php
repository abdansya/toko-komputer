<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Toko Komputer">
    <meta name="author" content="Abdan Syakuro">

    <title>@yield('title', config('app.name', 'Toko Komputer'))</title>

    <link href="{{ asset('css/bootstrap.min.css?') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css?') . time() }}" rel="stylesheet">

    <!--begin::Extra Style -->
    @yield('extraCss')
    <!--end::Extra Style -->
</head>

<body>
    @include('layouts.dashboard.navbar')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.dashboard.sidebar')

            @yield('content')
        </div>
    </div>

    @yield('modal')

    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    <!--begin::Extra Script -->
    @yield('extraJs')
    <!--end::Extra Script -->
    
</body>

</html>