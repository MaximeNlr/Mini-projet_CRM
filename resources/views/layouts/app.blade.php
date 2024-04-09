<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('styles/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/prospect.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/showMessage.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/create.css')}}"/>
</head>
<body>
    <header>
        <img src="./images/logo.png" alt="logo dans le header"/>
        <nav>
            <div class="headerContainer">
                <a href="{{route('clients.index')}}">Clients</a>
                <a href="{{route('prospects.index')}}">Prospects</a>
                <a href ="{{route('messages.index')}}">Messages</a>
            </div>
        </nav>
    </header>
        @yield('newProspect')
        @yield('content')
    </section>
    <footer>

    </footer>
    @yield('scripts')
</body>
</html>