@extends('layouts.app')

<style>
    .sectionDetailsClient 
    {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
    }
    h3 {
        color: #506BA5;
        text-align: center
    }
    .paragraphBlue {
        color: #506BA5;
        padding-bottom: 8px;
        padding-top: 11px;
    }
    .containerTitle {
        width: 100%;
        height: 40px;
        border-bottom: solid 1px #E8ECF1;
        margin-bottom: 15px;
    }
    
    .container {
        display: flex;
        padding-top: 30px;
        width: 130vh;
        height: 80vh;
        justify-content: center;
        border: solid 1px;
    }

    .message-container h4 {
        margin-bottom: 10px;
    }

    .paragrapheDetails
    {}

    .btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        height: max-content;
    }

    .btn:hover {
        background-color: #0056b3;
    }
    .btnDelete:hover {
        background-color: rgba(255, 0, 0, 0.652);
    }
    .btnDelete {
        padding: 10px 20px;
        background-color: red;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        height: max-content;
        font-weight: bold;
    }

    .btnContainerUpdate {
        display: flex;
        height: 15px;
    }
    .containerBtnDelete {
        width: 100%;
        display: flex;
        justify-content: end;
    }
    .formBtnDelete {
        margin-right: 10px;
    }
    #btnModifier {
        display: flex;
        justify-content: flex-end;
        margin-right: 5px;
    }
    #containerBtn {
        display: flex;
        flex-direction: row;
        justify-content: end;
        padding-top: 30px;
        padding-right: 20px;
        height: 50px;
        gap: 25px
    }
    .containerContent {
        display: flex;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }
</style>

@section('content')
<section class="sectionDetailsClient">
    <div class="container">
        <div class="containerTitle">
                            <div class="containerTitle">
                                <h3>Client</h3>
                            </div>
                            <div class="containerContent">
                                <div class="contentParagraphe">
                                    <p class="paragraphBlue">Nom</p>
                                    <p class="paragrapheDetails">{{$client->prospect->nom}}</p>
                                    <p class="paragraphBlue">Prénom</p>
                                    <p class="paragrapheDetails">{{$client->prospect->prenom}}</p>
                                </div>
                        
                                <div class="contentParagraphe">
                                    <p class="paragraphBlue">Email</p>
                                    <p>{{$client->prospect->email}}</p>
                                    <p class="paragraphBlue">Téléphone</p>
                                    <p>{{$client->prospect->tel}}</p>
                                </div>
                                
                                <p class="paragraphBlue">Adresse postale</p>
                                <p>{{$client->adresse}}</p>
                                
                                <p class="paragraphBlue">Délais de paiement</p>
                                <p>{{$client->delaisPaiement}}</p>
                                <p class="paragraphBlue">Date de création</p>
                                <p>{{$client->updated_at}}</p>
                                <p class="paragraphBlue">Date de modification</p>
                                <p>{{$client->updated_at}}</p>
                            
                                <div id="containerBtn">
                                    <div class="btnContainerUpdate">
                                        <a href="{{ route('clients.edit', ['client' => $client->id])}}" id="btnModifier" class="btn">Modifier</a>
                                    </div>
                                    <div class="containerBtnDelete">
                                        <form class="formBtnDelete" action="{{ route('clients.destroy', ['client' => $client->id])}}" method='POST'>
                                        @csrf
                                        @method('DELETE')
                                            <input class="btnDelete" type="submit" value="Supprimer"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 