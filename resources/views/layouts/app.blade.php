<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
    <link href="/css/app.css" rel="stylesheet">

    @yield('css')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
    'guest'     => Auth::check(),
]); ?>
    </script>
</head>
<body>
    <div id="app" class="container">
        @include('partials.navbar')

        @yield('content')
    </div>

    <!-- Scripts -->
    @yield('script')
</body>
</html>
