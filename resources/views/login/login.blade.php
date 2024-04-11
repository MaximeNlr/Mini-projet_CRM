@extends('layouts.auth')

@section('content')

<section>
    <div class="loginContainer">
                <h1>CONNEXION</h>
                <form action="/login" method="POST">
                    <div class="containerInputLogin">
                        @csrf
                        <div class="inputs">
                            <input name="email" type="email" placeholder="Votre adresse email" value="{{ old('email') }}"/>
                            @if ($errors->has('email'))
                                <p class="errorsInput">{{$errors->first('email')}}</p>
                            @endif
                        </div>
                        <div class="inputs">
                            <input name="password" type="password" placeholder="Votre mot de passe" required/>
                        </div>
                        
                        <div class="containerBtnConnexion">
                            <button type="submit" class="btnConnexion">Connexion</button>
                            <a class="accountBtn" href="{{route('register.create')}}">Créer un compte</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</section>


@endsection