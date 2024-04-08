<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
</head>
<body>
    <header>
        <div class="containerLogo">
            <img class="logo" src="/logo/logoTest.png" alt="">
        </div>
    </header>
    <section class="containerContent">
        @yield('content')
    </section>
    <footer></footer>
</body>
</html>