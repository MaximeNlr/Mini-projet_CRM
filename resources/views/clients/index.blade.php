@extends('layouts.app')

@section('content')
    <div class="containerBtn">
        <button id="toggleForm" style="display: hidden;">Ajouter un nouveau client</button>
        <div class="search-bar">
            <input type="text" placeholder="Rechercher" class="search-input" oninput="searchClient()">
        </div>
    </div>
    
    </div>
        <section class="containerTableBtn">
                <div class="containerTable">
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Date/Heure</th>
                            <th>Délais de paiement</th>
                            <th id="actionTh">Action</th>
                        </tr>
                        @foreach($clients as $client)
                        <tr class="editableRow">
                            <td><strong>{{$client->nom}}</strong></td>
                            <td><strong>{{$client->prenom}}</strong></td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->tel}}</td>
                            <td>{{$client->created_at}}</td>

                            <td>{{$client->delaisPaiement}}</td>
                            <td>
                                <div class="actionTd">
                                    <a href="{{route('clients.show', ['client' => $client->id ])}}" class="btn">détails</a>
                                    <form method="POST"  action="{{ route('clients.destroy', ['client' => $client->id]) }}">
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
        </section>
@endsection
@section('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
