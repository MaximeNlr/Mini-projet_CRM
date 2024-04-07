

    {{-- <div>
        <h4>Informations générales</h4>
        <p>Catégorie</p> 
        <p>{{$message->typeCommunication}}</p>
        <p>Date de création</p>
        <p>{{$message->updated_at}}</p>
        <p>Date de modification</p>
        {{$message->updated_at}}
    </div>
    
    <div>
        <h4>Déscription</h4>
        <p>{{$message->contenu}}</p>
    </div>

    <div>
        <h4>Prospect</h4>
        <p>Nom</p>
        <p>{{ $message->prospect->nom }}</p>
        <p>Prénom</p>
        <p>{{ $message->prospect->prenom }}</p>
        <p>Email</p>
        <p>{{$message->prospect->email}}</p>
        <p>Téléphone</p>
        <p>{{$message->prospect->tel}}</p>
    </div>
    
    <div>
        <a href="{{ route('messages.edit', ['message' => $message->id])}}"><input class="btn" type="button" value="Modifier"/></a>
        <form action="{{ route('messages.destroy', ['message' => $message->id])}}" method='POST'>
        @csrf
        @method('DELETE') 
        <input class="btn" type="submit" value="Supprimer"/></form>
    </div> --}}





    @extends('layouts.app')

    @section('content')

    <title>Message Details</title>
    <style>
        h3 {
            color: #506BA5;
            
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
            gap: 40px;
        }

        .left-section {
            width: 50%;
            height: 50%;
            /* overflow: auto; */
            padding: 10px;
        }

        .right-section {
            width: 50%;
            height: 100%;
            /* overflow: auto; */
            padding: 10px;
        }

        .message-container {
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 16px -8px;
        }

        .message-container h4 {
            margin-bottom: 10px;
        }

        .message-container p {
            margin: 5px 0;
        }
        .contentDescription {
            overflow: auto;
            height: 25vh;
        }
        .messageContainerRight {
            height: 55vh;
        }

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

        .btn-container {
            margin-top: 20px;
            display: flex;
            justify-content: end;
            margin-left: 5px;
            height: 15px;
        }
        .containerBtnDelete {
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }
        .formBtnDelete {
            margin-right: 10px;
        }
        #btnModifier {
            display: flex;
            justify-content: flex-end;
            margin-right: 5px;
        }
    </style>


<div class="container">
    <div class="left-section">
        <div class="message-container">
            <div class="containerTitle">
                <h3><strong>Informations générales</strong></h3>
            </div>
            <p class="paragraphBlue">Catégorie</p>
            <p>{{$message->typeCommunication}}</p>
            <p class="paragraphBlue">Date de création</p>
            <p>{{$message->updated_at}}</p>
            <p class="paragraphBlue">Date de modification</p>
            <p>{{$message->updated_at}}</p>
        </div>

        <div class="message-container contentDescription">
            <div class="containerTitle">
                <h3>Déscription</h3>
            </div>
            <p>{{$message->contenu}}</p>
        </div>
        <div class="btn-container">
            <a href="{{ route('messages.edit', ['message' => $message->id])}}" id="btnModifier" class="btn">Modifier</a>
        </div>
    </div>

    <div class="right-section">
        <div class="message-container messageContainerRight">
            <div class="containerTitle">
                <h3>Prospect</h3>
            </div>
                <p class="paragraphBlue">Nom</p>
                <p >{{$message->prospect->nom}}</p>
                <p class="paragraphBlue">Prénom</p>
                <p>{{$message->prospect->prenom}}</p>
                <p class="paragraphBlue">Email</p>
                <p>{{$message->prospect->email}}</p>
                <p class="paragraphBlue">Téléphone</p>
                <p>{{$message->prospect->tel}}</p>
        </div>

        <div class="containerBtnDelete">
            <form class="formBtnDelete" action="{{ route('messages.destroy', ['message' => $message->id])}}" method='POST'>
                @csrf
                @method('DELETE')
                <input class="btnDelete" type="submit" value="Supprimer"/>
            </form>
        </div>
    </div>
</div>

@endsection 