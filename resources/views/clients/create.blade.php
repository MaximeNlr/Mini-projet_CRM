@extends('layouts.app')

@section('title', 'Client')

@section('content')
    <section>
        <form action=" {{ route('clients.store') }}" method="POST">
            @csrf
            <div>
                <h1>Création d'un Client</h1>
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
                <div>
                    <label for="prospect_id">Email du client : </label>
                    <select name="prospect_id" id="prospect_id">
                        @foreach ($prospects as $prospect)
                        <option value="{{$prospect->id}}">{{$prospect->email}}</option>
                        @endforEach
                            @if ($errors->has('prospect_id'))
                                <p>{{ $errors->first('prospect_id')}}</p>
                            @endif
                    </select>
                </div>
                <button type="submit" class="btn-primary">Créer</button>
            </div>
        </form>
    </section>
@endsection