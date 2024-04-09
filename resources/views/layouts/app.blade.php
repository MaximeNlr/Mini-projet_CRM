<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mini-Projet-CRM | @yield('title')</title>
        <link rel="stylesheet" href="{{asset('styles/style.css')}}">
    </head>

    <body>

        <header>
            <div class="header-left">
                <h1>CRM VIP ENCHERES</h1>
            </div>
            <div class="header-right">
                <a href="{{ route('clients.index')}}">Liste des Clients</a>
                <a href="{{ route('clients.create') }}">Crée un nouveau Client</a>
            </div>
        </header>
        
        @yield('content')
    </body>

</html>