@extends('layouts.app')

@section('content')

<h2><u>Création d'une communication</u></h2>
<form class="formMessages" action="{{ route('messages.store') }}" method="POST">
    @csrf
    <div>
        <label for="email">Email du prospect contacté : </label>
        <input type="text" name="email" id="email" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <p>{{ $errors->first('email')}}</p>
        @endif
    </div>

    <div>
        <label for="typeCommunication">Type de communication :</label>
        <select name="typeCommunication" id="typeCommunication">
            <option value="telephone">Téléphone</option>
            <option value="email">Email</option>
            <option value="echangeDirect">Echange direct</option>
            <option value="courrier">Courrier</option>
        </select><br>
        @if ($errors->has('typeCommunication'))
            <p>{{ $errors->first('typeCommunication')}}</p>
        @endif
    </div>

    <div>
        <label for="contenu">Description de la communication :</label><br>
        <textarea name="contenu" id="contenu">{{ old('contenu') }}</textarea>
        @if ($errors->has('contenu'))
            <p>{{ $errors->first('contenu')}}</p>
        @endif
    </div>
    <input type="submit" value="Sauvegarder">
</form>
    
@endsection