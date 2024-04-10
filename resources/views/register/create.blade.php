@extends('layouts.auth')

@section('content')

<section>
    <div class="containerRegister">
        <h1>INSCRIPTION</h>
            <form action="/register" method="POST">
                <div class="containerInputRegister">
                    @csrf
                    <div class="inputs">
                        <input name="name" type="text" placeholder="Votre nom" value="{{ old('name') }}" required/>
                        @if ($errors->has('name'))
                            <p class="errorsInput">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="inputs">
                        <input name="name" type="text" placeholder="Votre prenom" value="{{ old('prenom') }}" required/>
                        @if ($errors->has('prenom'))
                            <p class="errorsInput">{{$errors->first('prenom')}}</p>
                        @endif
                    </div>
                    <div class="inputs">
                        <input name="email" type="email" placeholder="Votre adresse email" value="{{ old('email') }}" required/>
                        @if ($errors->has('email'))
                            <p class="errorsInput">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="inputs">
                        <input name="password" type="password" placeholder="Votre mot de passe" required/>
                    </div>
                    </div>
                    <div class="containerBtnRegister">
                        <button type="submit" class="btnRegister">Inscription</button>
                    </div>
            </div>
        </form>
     
</section>