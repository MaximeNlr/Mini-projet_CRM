@extends('layouts.app')

@section('content')
<div class="prospectContainer">
    <div class="prospectDetails">
        <div class="detailsHeader">
            <a href="{{ route('prospects.index') }}"  id="navigateButton">Retour à la liste des prospects</a>
            <div class="buttonContainer">
                <button id="editProspectBtn" class="detailsButtons" >Modifier</button>
                <button id="messageButton" class="detailsButtons">Contacter</button>
                <form method="POST"  action="{{ route('prospects.destroy', ['prospect' => $prospect->id]) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" id="deleteButton" class="detailsButtons" value="Supprimer"/>
                </form>
            </div>
        </div>
        <h1>Détails du Prospect</h1>
        <ul>
            <div class="liContainer">
                <div class="liInputsContainer">
                    <li><strong>Nom:</strong> {{ $prospect->nom }}</li>
                    <li><strong>Prénom:</strong> {{ $prospect->prenom }}</li>
                    <li><strong>Email:</strong> {{ $prospect->email }}</li>
                </div>
                <div class="liInputsContainer">
                    <li><strong>Téléphone:</strong> {{ $prospect->tel }}</li>
                    <li><strong>Date de Naissance:</strong> {{ $prospect->dateNaissance }}</li>
                    <li><strong>Besoin:</strong> {{ $prospect->besoin }}</li>
                </div>
            </div>
            <a href="{{ route('clients.create', ['prospect' => $prospect]) }}"class="detailsButtons" id="prospectToClient">Convertir en client</a>
        </ul>
        <div class="messageForm" style="display: none;">
            <form action="{{route('messages.store')}}" method="POST">
                @csrf 
                <div class="messageFormContainer">
                    <h3>Contacter le prospect</h3>
                    <textarea  name="message"></textarea>
                    <input type="submit" id="sendButton" value="Envoyer"/>
                </div>
            </form>
        </div>
        <div class="editForm" style="display: none;">
            <form  method="post" action="{{ route('prospects.update', ['prospect' => $prospect->id]) }}">
                @method('PUT')
                @csrf
                <div class="inputsContainer">
                    <input type="text" name="nom" value="{{ $prospect->nom }}" placeholder="Nom" required />
                    <input type="text" name="prenom" value="{{ $prospect->prenom }}" placeholder="Prénom" required />
                    <input type="email" name="email" value="{{ $prospect->email }}" placeholder="Email" required />
                    <input type="tel" name="tel" value="{{ $prospect->tel }}" placeholder="Téléphone" required />
                    <input type="date" name="dateNaissance" value="{{ $prospect->dateNaissance }}" placeholder="Date de Naissance" required />
                    <select name="besoin" required>
                        <option value="">Choisir le besoin</option>
                        <option value="Vehicule d'occasion" {{ $prospect->besoin == 'Vehicule d\'occasion' ? 'selected' : '' }}>Vehicule d'occasion</option>
                        <option value="Vehicule neuf" {{ $prospect->besoin == 'Vehicule neuf' ? 'selected' : '' }}>Vehicule neuf</option>
                        <option value="Vehicule de luxe" {{ $prospect->besoin == 'Vehicule de luxe' ? 'selected' : '' }}>Vehicule de luxe</option>
                        <option value="Vehicule utilitaire" {{ $prospect->besoin == 'Vehicule utilitaire' ? 'selected' : '' }}>Vehicule utilitaire</option>
                    </select>
                </div>
                <input type="submit" id="validateEditButton"/>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
