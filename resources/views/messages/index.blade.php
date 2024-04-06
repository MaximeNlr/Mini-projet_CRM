@extends('layouts.app')


@section('content')
    <section class="containerTableBtn"></section>
        <div class="containerBtn">
            <a href="{{ route('messages.create')}}"><input type="button" value="+ Nouveau" class="btnNewPost"></a>
        </div>
            <div class="containerTable">
                <table>
                    <tr>
                        <th>Date/Heure</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Type de communication</th>
                        <th></th>
                    </tr>
                    @foreach($messages as $message)
                    <tr>
                        <td>{{$message->created_at}}</td>
                        <td class="tdNom"><strong>{{$message->prospect->nom}}</strong></td>
                        <td class="tdPrenom"><strong>{{$message->prospect->prenom}}</strong></td>
                        <td>{{$message->prospect->email}}</td>
                        <td>{{$message->prospect->tel}}</td>
                        <td>{{$message->typeCommunication}}</td>
                        <td>
                            <a href="{{ route('messages.show', ['message' => $message->id]) }}"><button class="btn">Détails</button></a>
                            <a href="{{ route('messages.edit', ['message' => $message->id])}}"><input class="btn" type="button" value="Modifier"/></a>
                            <form action="{{ route('messages.destroy', ['message' => $message->id])}}" method='POST'>
                               @csrf
                               @method('DELETE') 
                                <input class="btn" type="submit" value="Supprimer"/></form>
                        </td>
                    </tr>
                    @endforEach
                </table>
            </div>
@endsection