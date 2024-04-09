@extends('layouts.app')

@section('title','Modification d\'un prospect')

@section('content')
    <form action="{{ route('prospects.update', ['prospect' => $prospect->id]) }}" method="post">
    @method('PUT')
    @csrf
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" value="{{$prospect->nom}}" required />
            @if($errors->has('nom'))
                <p>{{$errors->first('nom')}}</p>
            @endif
        </div>
        <div>
            <label for="prenom">Prenom :</label>
            <input type="text" name="prenom" value="{{$prospect->prenom}}" required />
            @if($errors->has('prenom'))
                <p>{{$errors->first('prenom')}}</p>
            @endif
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" value="{{$prospect->email}}" required />
            @if($errors->has('email'))
                <p>{{$errors->first('email')}}</p>
            @endif
        </div>
        <div>
            <label for="tel">Tel :</label>
            <input type="tel" name="tel" value="{{$prospect->tel}}" required />
            @if($errors->has('tel'))
                <p>{{$errors->first('tel')}}</p>
            @endif
        </div>
        <div>
            <label for="date">Date de naissance :</label>
            <input type="date" name="dateNaissance" value="{{$prospect->dateNaissance}}" required />
            @if($errors->has('dateNaissance'))
                <p>{{$errors->first('dateNaissance')}}</p>
            @endif
        </div>
        <div>
            <label for="besoin">Besoin :</label>
            <select name="besoin" id="">
                <option value="{{$prospect->besoin}}"></option>
                <option value="Vehicule d'occasion">Vehicule d'occasion</option>
                <option value="Vehicule neuf">Vehicule neuf</option>
                <option value="Vehicule de luxe">Vehicule de luxe</option>
                <option value="Vehicule utilitaire">Vehicule</option>
            </select>
        </div>
        <input type="submit" value="valider"/>
    </form>
@endsection