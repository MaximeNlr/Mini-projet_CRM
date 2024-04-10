@extends('layouts.app')


@section('content')
<div class="containerBtn">
    <a href="{{ route('ventes.create')}}"><input type="button" value="+ Nouveau" class="btnNewPost"></a>
</div>
    <section class="containerTableBtn">
        
            <div class="containerTable">
                <table>
                    <tr>
                        <th>Date/Heure</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Vente</th>
                        <th>Prix HT</th>
                        <th>TVA</th>
                        <th></th>
                    </tr>
                    @foreach($ventes as $vente)
                    <tr>
                        <td>{{$vente->created_at}}</td>
                        <td class="tdNom"><strong>{{$vente->client->prospect->nom}}</strong></td>
                        <td class="tdPrenom"><strong>{{$vente->client->prospect->prenom}}</strong></td>
                        <td>{{$vente->client->prospect->email}}</td>
                        <td>{{$vente->titre}}</td>
                        <td>{{$vente->prixHT}}</td>
                        <td>{{$vente->tva}}</td>
                        <td class="tdBtn">
                            <a href="{{ route('ventes.show', ['vente' => $vente->id]) }}"><button class="btn">Détails</button></a>
                            <a href="{{ route('ventes.edit', ['vente' => $vente->id])}}"><input class="btn" type="button" value="Modifier"/></a>
                            <form action="{{ route('ventes.destroy', ['vente' => $vente->id])}}" method='POST'>
                               @csrf
                               @method('DELETE') 
                                <input class="btn" type="submit" value="Supprimer"/></form>
                        </td>
                    </tr>
                    @endforEach
                </table>
            </div>
@endsection