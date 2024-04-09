@extends('layouts.app')

@section('content')
<form class="formMessages" action="{{ route('messages.store') }}" method="POST">
    @csrf
    <div>
        <label for="prospect_id">Email du prospect contacté : </label>
        <select name="prospect_id" id="prospect_id">
            @foreach ($prospects as $prospect)
            <option value="{{$prospect->id}}">{{$prospect->email}}</option>
            @endforEach
        </select>
        @if ($errors->has('prospect_id'))
            <p>{{ $errors->first('prospect_id')}}</p>
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
    <input type="submit" value="Sauvegarder" class="btn">
</form>
    
@endsection