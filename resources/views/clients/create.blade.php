@extends('layouts.app')

@section('title', 'Client')

@section('content')
<style>
        .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; 
    }

    .form-container {
        max-width: 400px;
        padding: 20px;
        border: 1px solid #007bff;
        border-radius: 10px; 
        background-color: #ffffff;
    }

    h1 {
        text-align: center;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"], select {
        width: 90%; 
        padding: 10px;
        border-radius: 5px; 
        border: 1px solid #007bff;
    }

    button[type="submit"] {
        width: 100%; /* Largeur du bouton */
        padding: 10px; /* Espacement intérieur */
        border: none; /* Pas de bordure */
        border-radius: 5px; /* Coins arrondis */
        background-color: #007bff; /* Couleur de fond du bouton en bleu */
        color: #ffffff; /* Couleur du texte en blanc */
        cursor: pointer; /* Curseur au survol */
    }

    button[type="submit"]:hover {
        background-color: #0056b3; /* Couleur de fond du bouton au survol */
    }
</style>
<div class="container">
    <div class="form-container">
        <h1>Création d'un Client</h1>
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" id="adresse" class="form-control">
                @if ($errors->has('adresse'))
                    <p>{{ $errors->first('adresse')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="delaisPaiment">Délai de paiement :</label>
                <input type="text" name="delaisPaiement" id="delaisPaiement" class="form-control" value="30">
                @if ($errors->has('delaisPaiement'))
                    <p>{{ $errors->first('delaisPaiement')}}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="prospect_id">Email du prospect contacté : </label>
                <select name="prospect_id" id="prospect_id">
                    @foreach ($prospects as $prospect)
                    <option value="{{$prospect->id}}">{{$prospect->email}}</option>
                    @endforeach
                </select>
                @if ($errors->has('prospect_id'))
                    <p>{{ $errors->first('prospect_id')}}</p>
                @endif
            </div>

            <button type="submit" class="btn-primary">Créer</button>
        </form>
    </div>
</div>
@endsection
