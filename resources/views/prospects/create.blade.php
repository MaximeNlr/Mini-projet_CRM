@extends('layouts.app')

@section('title','Création d\'un prospect')

@section('content')
    <form action="{{ route('prospects.store') }}" method="post">
    @csrf
    <div class="formContainer">
        <div class="formColumn">
            <div class="inputs">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" value="{{old ('nom') }}" required />
                @if($errors->has('nom'))
                    <p>{{$errors->first('nom')}}</p>
                @endif

                <label for="prenom">Prenom :</label>
                <input type="text" name="prenom" value="{{old ('prenom') }}" required />
                @if($errors->has('prenom'))
                    <p>{{$errors->first('prenom')}}</p>
                @endif
            </div>
        </div>
        <div class="formColumn">
            <div class="inputs">
                <label for="email">Email :</label>
                <input type="email" name="email" value="{{old ('email') }}" required />
                @if($errors->has('email'))
                    <p>{{$errors->first('email')}}</p>
                @endif
                <label for="tel">Tel :</label>
                <input type="tel" name="tel" value="{{old ('tel') }}" required />
                @if($errors->has('tel'))
                    <p>{{$errors->first('tel')}}</p>
                @endif
            </div>
        </div>
        <div class="formColumn">
            <div class="inputs">
                <label for="date">Date de naissance :</label>
                <input type="date" name="dateNaissance" value="{{old ('dateNaissance') }}" required />
                @if($errors->has('dateNaissance'))
                    <p>{{$errors->first('dateNaissance')}}</p>
                @endif
                <label for="besoin">Besoin :</label>
                <select name="besoin" id="">
                    <option value=""></option>
                    <option value="Vehicule d'occasion">Vehicule d'occasion</option>
                    <option value="Vehicule neuf">Vehicule neuf</option>
                    <option value="Vehicule de luxe">Vehicule de luxe</option>
                    <option value="Vehicule utilitaire">Vehicule</option>
                </select>
            </div>
        </div>
        <input type="submit" value="valider"/>
    </div>
    </form>
        @if(session()->has('success'))
            <p>{{ session()->get('success') }}</p>
        @endif
@endsection