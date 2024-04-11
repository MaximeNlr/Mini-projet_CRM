@extends('layouts.app')

@section('title', 'Client')

@section('content')
    <form class="formMessagesVentes" action=" {{ route('clients.store') }}" method="POST">
        @csrf
        <h2>Convertion d'un prospect</h2>
        <div class="formContainer">
            <div class="right">
                <input type="text" name="nom" value="{{ $prospect->nom }}" readonly />
                    @if($errors->has('nom'))
                        <p>{{$errors->first('nom')}}</p>
                    @endif
                <input type="text" name="prenom" value="{{ $prospect->prenom }}" placeholder="Prénom" readonly />
                    @if($errors->has('prenom'))
                        <p>{{$errors->first('prenom')}}</p>
                    @endif
                <input type="email" name="email" value="{{ $prospect->email }}" placeholder="Email" readonly />
                    @if($errors->has('email'))
                        <p>{{$errors->first('email')}}</p>
                    @endif
            </div>
            <div class="left">
                <input type="tel" name="tel" value="{{ $prospect->tel }}" readonly />
                    @if($errors->has('tel'))
                        <p>{{$errors->first('tel')}}</p>
                    @endif
                <input type="date" name="dateNaissance" value="{{ $prospect->dateNaissance }}" readonly />
                    @if($errors->has('dateNaissance'))
                        <p>{{$errors->first('dateNaissance')}}</p>
                    @endif
                <input type="text" name="besoin" value="{{ $prospect->besoin }}" readonly />
                <input type="hidden" name="prospect_id" value="{{ $prospect->id }}">
            </div>
        </div>
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
        <button type="submit" class="btn" id="clientValidateButton">Convertir</button>
    </form>

@endsection
