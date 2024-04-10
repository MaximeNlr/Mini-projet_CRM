@extends('layouts.app')

@section('content')
<h2><u>Modification d'une vente</u></h2>
<form class="formMessages" action="{{ route('ventes.update', ['vente' => $vente->id]) }}" method="POST">
    @method('PUT')
    @csrf
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
        <input type="text" name="prixHT" id="prixHT" value="{{ old('prixHT') ?? $vente->prixHT }}">
        @if ($errors->has('prixHT'))
        <p>{{ $errors->first('titre')}}</p>
    @endif
    </div>

    <div>
        <label for="tva">TVA :</label>
        <input type="text" name="tva" id="tva" value="{{ old('tva') ?? $vente->tva }}">
        @if ($errors->has('tva'))
        <p>{{ $errors->first('tva')}}</p>
    @endif
    </div>
    
    <div>
        <label for="titre">Titre :</label>
        <input name="titre" id="titre" value="{{ old('titre') ?? $vente->titre }}"><br>
        @if ($errors->has('titre'))
            <p>{{ $errors->first('titre')}}</p>
        @endif
    </div>

    <div>
        <label for="description">Description: </label><br>
        <textarea name="description" id="description">{{ old('description') ?? $vente->description }}</textarea>
        @if ($errors->has('description'))
            <p>{{ $errors->first('description')}}</p>
        @endif
    </div>
    <input type="submit" value="Modifier">
</form>

@endsection