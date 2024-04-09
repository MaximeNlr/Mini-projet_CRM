@extends('layouts.app')

@section('content')
    <section>
        <div class="containerBtn">
            <a href="{{ route('messages.create')}}"><input type="button" value="+ Nouveau" class="btnNewPost"></a>
        </div>
            <div class="containerTableBtn">
                <div class="containerTable">
                    <table>
                        <tr>
                            <th>Date/Heure</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Délais de paiement</th>
                            <th></th>
                        </tr>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{$client->created_at}}</td>
                                <td class="tdNom"><strong>{{$client->prospect->nom}}</strong></td>
                                <td class="tdPrenom"><strong>{{$client->prospect->prenom}}</strong></td>
                                <td>{{$client->prospect->email}}</td>
                                <td>{{$client->prospect->tel}}</td>
                                <td>{{$client->delaisPaiement}}</td>
                                <td class="tdBtn">
                                    <a href="{{ route('clients.show', ['client' => $client->id]) }}"><button class="btn">Détails</button></a>
                                    <a href="{{ route('clients.edit', ['client' => $client->id])}}"><input class="btn" type="button" value="Modifier"/></a>
                                    <form action="{{ route('clients.destroy', ['client' => $client->id])}}" method='POST'>
                                    @csrf
                                    @method('DELETE') 
                                    <input class="btn" type="submit" value="Supprimer"/></form>
                                </td>
                            </tr>
                        @endforEach
                    </table>
                </div>
            </div>
    </section>
@endsection