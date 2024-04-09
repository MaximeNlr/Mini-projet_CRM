@extends('layouts.app')

@section('content')
    <section class="formMessages">
        <div>
        <h2><u>Modification d'un client</u></h2>
        <form class="formMessages" action="{{ route('clients.update', ['client' => $client->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="containerCreate">
                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse') ?? $client->adresse }}">
                    @if ($errors->has('adresse'))
                        <p>{{ $errors->first('adresse')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="delaisPaiment">Délais de paiement :</label>
                    <input type="text" name="delaisPaiement" id="delaisPaiement" class="form-control" value="{{ old('delaisPaiement') ?? $client->delaisPaiement }}">
                    @if ($errors->has('delaisPaiement'))
                        <p>{{ $errors->first('delaisPaiement')}}</p>
                    @endif
                </div>
                <label for="prospect_id">Email du client : </label>
                <select name="prospect_id" id="prospect_id">
                    @foreach ($prospects as $prospect)
                    <option value="{{$prospect->id}}">{{$prospect->email}}</option>
                    @if ($errors->has('prospect_id'))
                        <p>{{ $errors->first('prospect_id')}}</p>
                    @endif
                    @endforEach
                </select>
                <button type="submit" class="btn-primary">Créer</button>
            </div>
        </form>
    </section>  
@endsection