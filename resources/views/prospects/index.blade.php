@extends('layouts.app')
@section('newProspect')
@endsection
@section('content')
<div class="containerBtn">
    <button id="toggleForm">Ajouter un nouveau prospect</button>
</div>
    <div class="prospectForm" style="display: none;">
        <form method="post" action="{{route('prospects.store')}}">
            @csrf
            <div class="formContainer">
                    <input type="text" name="nom" value="{{old ('nom') }}" placeholder="Nom" required />
                        @if($errors->has('nom'))
                            <p>{{$errors->first('nom')}}</p>
                        @endif
                    <input type="text" name="prenom" value="{{old ('prenom') }}" placeholder="Prénom" required />
                        @if($errors->has('prenom'))
                            <p>{{$errors->first('prenom')}}</p>
                        @endif
                    <input type="email" name="email" value="{{old ('email') }}" placeholder="Email" required />
                        @if($errors->has('email'))
                            <p>{{$errors->first('email')}}</p>
                        @endif
                    <input type="tel" name="tel" value="{{old ('tel') }}" placeholder="Téléphone" required />
                        @if($errors->has('tel'))
                            <p>{{$errors->first('tel')}}</p>
                        @endif
                    <input type="date" name="dateNaissance" value="{{old ('dateNaissance') }}" placeholder="Date de naissance" required />
                        @if($errors->has('dateNaissance'))
                            <p>{{$errors->first('dateNaissance')}}</p>
                        @endif
                    <select name="besoin" id="">
                        <option value="">Besoin</option>
                        <option value="Vehicule d'occasion">Vehicule d'occasion</option>
                        <option value="Vehicule neuf">Vehicule neuf</option>
                        <option value="Vehicule de luxe">Vehicule de luxe</option>
                        <option value="Vehicule utilitaire">Vehicule</option>
                    </select>
                <input type="submit" id="validateButton" value="valider"/>
            </div>
        </form>
    </div>
    <table id="prospectsTable">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Date de naissance</th>
            <th>Besoin</th>
            <th id="actionTh">Action</th>
        </tr>
        @foreach ($prospects as $prospect)
            <tr class="editableRow">
                <td>{{ $prospect->nom }}</td>
                <td>{{ $prospect->prenom }}</td>
                <td>{{ $prospect->email }}</td>
                <td>{{ $prospect->tel }}</td>
                <td>{{ $prospect->dateNaissance }}</td>
                <td>{{ $prospect->besoin }}</td>
                <td>
                    <div class="actionTd">
                        <a href="{{route('prospects.show', ['prospect' => $prospect->id ])}}" class="btn">Detail</a>
                        <form method="POST"  action="{{ route('prospects.destroy', ['prospect' => $prospect->id]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" id="deleteButton" class="btn" value="Supprimer"/>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
@section('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection