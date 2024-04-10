@extends('layouts.auth')

@section('content')

<section>
    <div class="containerLogin">
        <div class="containerTitleLogo">
            <div>
                <h1>CONNEXION</h>
            </div>
            <div class="divLogo">
                <img src="/images/logo.png" alt="logo">
            </div>
            </div>
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
                        </div>
                    </div>
            </form>
        </div>
    </div>
</section>


@endsection