@extends('layouts.app')

@section('content')
    <div class="containerBtn">
        <button id="toggleForm">Ajouter un nouveau client</button>
    </div>
    <div class="prospectForm" style="display: none;">
        <form action=" {{ route('clients.store') }}" method="POST">
            @csrf
    
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" id="adresse" class="form-control">
                @if ($errors->has('adresse'))
                    <p>{{ $errors->first('adresse')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="delaisPaiment">Délai de paiement :</label>
                <input type="text" name="delaisPaiement" id="delaisPaiement" class="form-control" value="30">
                @if ($errors->has('delaisPaiement'))
                    <p>{{ $errors->first('delaisPaiement')}}</p>
                @endif
            </div>
    
            <label for="prospect_id">Email du prospect contacté : </label>
            <select name="prospect_id" id="prospect_id">
                @foreach ($prospects as $prospect)
                <option value="{{$prospect->id}}">{{$prospect->email}}</option>
                @endforEach
                @if ($errors->has('prospect_id'))
                    <p>{{ $errors->first('prospect_id')}}</p>
                @endif
            </select>
            <button type="submit" class="btn-primary">Créer</button>
        </form>
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
                            <th>Délais de paiement</th>
                            <th>Action</th>
                        </tr>
                        @foreach($clients as $client)
                        <tr>
                            <td>{{$client->created_at}}</td>
                            <td class="tdNom"><strong>{{$client->prospect->nom}}</strong></td>
                            <td class="tdPrenom"><strong>{{$client->prospect->prenom}}</strong></td>
                            <td>{{$client->prospect->email}}</td>
                            <td>{{$client->prospect->tel}}</td>
                            <td>{{$client->delaisPaiement}}</td>
                            <td>
                                <div class="actionTd">
                                    <a href="{{route('clients.show', ['client' => $client->id ])}}" class="btn">Detail</a>
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
