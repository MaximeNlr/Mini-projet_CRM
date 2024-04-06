@extends('layouts.app')

@section('content')

    <h2>Communication avec prospect : {{ $message->prospect->nom }} {{ $message->prospect->prenom }}</h2>
    <div>
        <p>Date de création :{{$message->created_at}}</p>
        <p>Date de modification : {{$message->updated_at}}</p>
        <p>Type de communication : {{$message->typeCommunication}}</p>
        <p>Email : {{$message->prospect->email}}</p>
        <p>Téléphone : {{$message->prospect->tel}}</p>
        <p>Détails de la communication :</p>
        <p>{{$message->contenu}}</p>
            <a href="{{ route('messages.edit', ['message' => $message->id])}}"><input class="btn" type="button" value="Modifier"/></a>
            <form action="{{ route('messages.destroy', ['message' => $message->id])}}" method='POST'>
                @csrf
                @method('DELETE') 
                    <input class="btn" type="submit" value="Supprimer"/></form>
    </div>


@endsection