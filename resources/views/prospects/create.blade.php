@extends('layouts.app')

@section('title','Création d\'un prospect')

@section('content')
    <form method="POST" action="{{ route('prospects.store') }}">
    @csrf
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="{{old ('nom') }}" required />
            @if($errors->has('nom'))
                <p>{{$errors->first('nom')}}
            @endif
        </div>
        <div>
            <label for="prenom">Prenom :</label>
            <input type="text" id='prenom' name="prenom" value="{{old ('prenom') }}" required />
            @if($errors->has('prenom'))
                <p>{{$errors->first('prenom')}}
            @endif
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="{{old ('email') }}" required />
            @if($errors->has('email'))
                <p>{{$errors->first('email')}}
            @endif
        </div>
        <div>
            <label for="tel">Tel :</label>
            <input id="tel" type="tel" name="tel" value="{{old ('tel') }}" required />
            @if($errors->has('tel'))
                <p>{{$errors->first('tel')}}
            @endif
        </div>
        <div>
            <label for="date">Date de naissance :</label>
            <input type="date" name="dateNaissance" id="dateNaissance" value="{{old ('dateNaissance') }}" required />
            @if($errors->has('dateNaissance'))
                <p>{{$errors->first('dateNaissance')}}
            @endif
        </div>
        <div>
            <label for="besoin">Besoin :</label>
            <select name="besoin" id="besoin">
                <option value=""></option>
                <option value="Vehicule d'occasion">Vehicule d'occasion</option>
                <option value="Vehicule neuf">Vehicule neuf</option>
                <option value="Vehicule de luxe">Vehicule de luxe</option>
                <option value="Vehicule utilitaire">Vehicule</option>
            </select>
        </div>
        <input type="submit" value="valider"/>
    </form>
    @if(session()->has('success'))
        <p>🎉 {{ session()->get('success') }}</p>
    @endif
@endsection