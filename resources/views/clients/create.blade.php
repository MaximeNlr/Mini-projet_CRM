@extends('layouts.app')

@section('title', 'Client')

@section('content')
<h1>Ajouter un Client</h1>
    <form action=" {{ route('clients.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" id="adresse" class="form-control">
        </div>

        <div class="form-group">
            <label for="delai_paiement">Délai de paiement :</label>
            <input type="text" name="delai_paiement" id="delai_paiement" class="form-control" value="30">
        </div>

        <input type="hidden" name="prospect_id" value="{{ $prospect->id }}">

        <button type="submit" class="btn-primary">Créer Client</button>
    </form>


@endsection