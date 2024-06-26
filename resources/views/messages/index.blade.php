@extends('layouts.app')


@section('content')
<div class="containerBtn">
    <a href="{{ route('messages.create')}}" class="btnNewPost">+ Message</a>
    <div class="search-bar">
        <input type="text" placeholder="Rechercher" class="search-input" oninput="searchClient()">
    </div>
</div>
    <section class="containerTableBtn">
        <div class="containerTable">
            <table>
                <tr>
                    <th>Date/Heure</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Type de communication</th>
                    <th id="actionTh">Action</th>
                </tr>
                @foreach($messages as $message)
                <tr class="editableRow">
                    <td>{{$message->created_at}}</td>
                    <td class="tdNom"><strong>{{$message->prospect->nom}}</strong></td>
                    <td class="tdPrenom"><strong>{{$message->prospect->prenom}}</strong></td>
                    <td>{{$message->prospect->email}}</td>
                    <td>{{$message->prospect->tel}}</td>
                    <td>{{$message->typeCommunication}}</td>
                    <td>
                        <div class="actionTd">
                            <a href="{{ route('messages.show', ['message' => $message->id]) }}" class="btn">détails</a>
                            <form action="{{ route('messages.destroy', ['message' => $message->id])}}" method='POST'>
                            @csrf
                            @method('DELETE') 
                            <input id="deleteButton" class="btn" type="submit" value="Supprimer"/></form>
                        </div>
                    </td>
                </tr>
                @endforEach
            </table>
        </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection