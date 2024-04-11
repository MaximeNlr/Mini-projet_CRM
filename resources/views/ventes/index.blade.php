@extends('layouts.app')


@section('content')
<div class="containerBtn">
    <a href="{{ route('ventes.create')}}" class="btnNewPost">+ Vente</a>
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
                        <th>Vente</th>
                        <th>Prix HT</th>
                        <th>TVA</th>
                        <th id="actionTh">Action</th>
                    </tr>
                    @foreach($ventes as $vente)
                    <tr>
                        <td>{{$vente->created_at}}</td>
                        <td>{{$vente->client->prospect->nom}}</td>
                        <td>{{$vente->client->prospect->prenom}}</td>
                        <td>{{$vente->client->prospect->email}}</td>
                        <td>{{$vente->titre}}</td>
                        <td>{{$vente->prixHT}}</td>
                        <td>{{$vente->tva}}</td>
                        <td>
                            <div class="actionTd">
                                <a href="{{ route('ventes.show', ['vente' => $vente->id]) }}" class="btn ">détails</a>
                                <form action="{{ route('ventes.destroy', ['vente' => $vente->id])}}" method='POST'>
                                @csrf
                                @method('DELETE') 
                                    <input type="submit" id="deleteButton" class="btn" value="Supprimer"/>
                                </form>
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