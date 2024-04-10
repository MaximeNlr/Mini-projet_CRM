@extends('layouts.app')

@section('content')
<form class="formMessagesVentes" action="{{ route('ventes.store') }}" method="POST">
    @csrf
    <h2>Création d'une vente</h2>
    <div>
        <label for="client_id">Email du client : </label>
        <select name="client_id" id="client_id">
            @foreach ($clients as $client)
            <option value="{{$client->id}}">{{$client->prospect->email}}</option>
            @endforEach
        </select>
        @if ($errors->has('client_id'))
            <p>{{ $errors->first('client_id')}}</p>
        @endif
    </div>
    
    <div>
        <label for="prixHT">Prix HT :</label>
        <input type="number" name="prixHT" id="prixHT" value="{{ old('prixHT') }}">
        @if ($errors->has('prixHT'))
        <p>{{ $errors->first('titre')}}</p>
    @endif
    </div>

    <div>
        <label for="tva">TVA :</label>
        <input type="number" name="tva" id="tva" value="{{ old('tva') }}">
        @if ($errors->has('tva'))
        <p>{{ $errors->first('tva')}}</p>
    @endif
    </div>
    
    <div>
        <label for="titre">Titre :</label>
        <input name="titre" id="titre" value="{{ old('titre') }}">
        @if ($errors->has('titre'))
            <p>{{ $errors->first('titre')}}</p>
        @endif
    </div>

    <div>
        <label for="description">Description: </label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
        @if ($errors->has('description'))
            <p>{{ $errors->first('description')}}</p>
        @endif
    </div>
    <input type="submit" class="btn" value="Enregistrer">
</form>

@endsection