@extends('layouts.app')

    @section('content')

    <title>Vente détails</title>
<div class="container">
    <div class="left-section">
        <div class="message-container">
            <div class="containerTitle">
                <h3><strong>Informations générales</strong></h3>
            </div>
            <p class="paragraphBlue">Catégorie</p>
            <p>{{$vente->titre}}</p>
            <p class="paragraphBlue">Prix HT</p>
            <p>{{$vente->prixHT}}  €</p>
            <p class="paragraphBlue">TVA</p>
            <p>{{$vente->tva}}</p>
            <p class="paragraphBlue">Date de création</p>
            <p>{{$vente->updated_at}}</p>
            <p class="paragraphBlue">Date de modification</p>
            <p>{{$vente->updated_at}}</p>
        </div>

        <div class="message-container contentDescription">
            <div class="containerTitle">
                <h3>Déscription</h3>
            </div>
            <p>{{$vente->description}}</p>
        </div>
        <div class="btn-container">
            <a href="{{ route('ventes.edit', ['vente' => $vente->id])}}" id="btnModifier" class="btn">Modifier</a>
        </div>
    </div>

    <div class="right-section">
        <div class="message-container messageContainerRight">
            <div class="containerTitle">
                <h3>Client</h3>
            </div>
                <p class="paragraphBlue">Nom</p>
                <p >{{$vente->client->prospect->nom}}</p>
                <p class="paragraphBlue">Prénom</p>
                <p>{{$vente->client->prospect->prenom}}</p>
                <p class="paragraphBlue">Email</p>
                <p>{{$vente->client->prospect->email}}</p>
                <p class="paragraphBlue">Téléphone</p>
                <p>{{$vente->client->prospect->tel}}</p>
                <p class="paragraphBlue">Adresse</p>
                <p>{{$vente->client->adresse}}</p>
                <p class="paragraphBlue">Délais de paiement</p>
                <p>{{$vente->client->delaisPaiement}}</p>
        </div>

        <div class="containerBtnDelete">
            <form class="formBtnDelete" action="{{ route('ventes.destroy', ['vente' => $vente->id])}}" method='POST'>
                @csrf
                @method('DELETE')
                <input class="btnDelete" type="submit" value="Supprimer"/>
            </form>
        </div>
    </div>
</div>

@endsection 