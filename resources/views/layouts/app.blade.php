<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('styles/prospect.css') }}">
    
</head>
<body>
    <header>

    </header>

    <main>
        @yield('title')
        @yield('content')
    </main>

    <footer>

    </footer>
    @yield('scripts')
</body>
</html>