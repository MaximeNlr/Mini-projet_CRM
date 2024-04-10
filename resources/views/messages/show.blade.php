@extends('layouts.app')
@section('content')

<title>Message Details</title>
<div class="container">
<div class="left-section">
    <div class="message-container">
        <div class="containerTitle">
            <h3><strong>Informations générales</strong></h3>
        </div>
        <p class="paragraphBlue">Catégorie</p>
        <p>{{$message->typeCommunication}}</p>
        <p class="paragraphBlue">Date de création</p>
        <p>{{$message->updated_at}}</p>
        <p class="paragraphBlue">Date de modification</p>
        <p>{{$message->updated_at}}</p>
    </div>

    <div class="message-container contentDescription">
        <div class="containerTitle">
            <h3>Déscription</h3>
        </div>
        <p>{{$message->contenu}}</p>
    </div>
    <div class="btn-container">
        <a href="{{ route('messages.edit', ['message' => $message->id])}}" id="btnModifier" class="btn">Modifier</a>
    </div>
</div>

<div class="right-section">
    <div class="message-container messageContainerRight">
        <div class="containerTitle">
            <h3>Prospect</h3>
        </div>
            <p class="paragraphBlue">Nom</p>
            <p >{{$message->prospect->nom}}</p>
            <p class="paragraphBlue">Prénom</p>
            <p>{{$message->prospect->prenom}}</p>
            <p class="paragraphBlue">Email</p>
            <p>{{$message->prospect->email}}</p>
            <p class="paragraphBlue">Téléphone</p>
            <p>{{$message->prospect->tel}}</p>
    </div>

    <div class="containerBtnDelete">
        <form class="formBtnDelete" action="{{ route('messages.destroy', ['message' => $message->id])}}" method='POST'>
            @csrf
            @method('DELETE')
            <input class="btnDelete" type="submit" value="Supprimer"/>
        </form>
    </div>
</div>
</div>

@endsection 