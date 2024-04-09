@extends('layouts.loginLayout')

@section('content')

<section>
    <div class="containerLogin">
        <div class="containerTitleLogo">
            <div>
                <h1>CONNEXION</h>
            </div>
            <div class="divLogo">
                <img src="/logo/logoTest.png" alt="logo">
            </div>
            </div>
            <div class="containerInput">
                <form action="/login" method="POST">
                    @csrf
                    <div class="email">
                        <input name="email" type="email" placeholder="Votre adresse email" value="{{ old('email') }}"/>
                        {{-- @if ($errors->has('email'))
                            <p class="errorsInput">{{$errors->first('email')}}</p>
                        @endif --}}
                    </div>
                    <div class="password">
                        <input name="password" type="password" placeholder="Votre mot de passe" required/>
                    </div>
                    </div>
                    <div class="containerBtnConnexion">
                        <button type="submit" class="btnConnexion">Connexion</button>
                    </div>

            </form>
        </div>
    </div>
</section>


@endsection