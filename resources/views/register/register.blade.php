@extends('layouts.registerLayout')

@section('content')

<section>
    <div class="containerRegister">
        <div class="title">
            <h1>INSCRIPTION</h>
        </div> 
        <div class="containerInput">
            <form action="/register" method="POST">
                @csrf
                <div class="nom">
                    <input name="name" type="text" placeholder="Votre nom et prénom" value="{{ old('name') }}" required/>
                    @if ($errors->has('name'))
                        <p class="errorsInput">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="email">
                    <input name="email" type="email" placeholder="Votre adresse email" value="{{ old('email') }}" required/>
                    @if ($errors->has('email'))
                        <p class="errorsInput">{{$errors->first('email')}}</p>
                    @endif
                </div>
                <div class="password">
                    <input name="password" type="password" placeholder="Votre mot de passe" required/>
                </div>
            </div>
            <div class="containerBtnRegister">
                <button type="submit" class="btnRegister">Inscription</button>
            </div>
        </form>
    </div> 
</section>