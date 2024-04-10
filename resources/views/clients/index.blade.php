@extends('layouts.app')

@section('content')
<nav>
    <div class="search-bar">
        <input type="text" placeholder="Rechercher par Nom ..." class="search-input" oninput="searchClient()">
    </div>
    <a href="{{ route('clients.create')}}"><input type="button" value="+ Nouveau" class="btnNewPost"></a>
</nav>
<h1>Liste Des Clients</h1>
<div class="containerBtn">
    
</div>
<section class="containerTableBtn">
    <div class="containerTable">
        <table id="clientsTable">
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
                <td class="tdBtn">
                    <a href="{{ route('clients.show', ['client' => $client->id]) }}"><button class="btn">Détails</button></a>
                    <form action="{{ route('clients.destroy', ['client' => $client->id])}}" method='POST'>
                    @csrf
                    @method('DELETE') 
                        <input class="btns" type="submit" value="Supprimer"/>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function searchClient() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementsByClassName("search-input")[0];
        filter = input.value.toUpperCase();
        table = document.getElementById("clientsTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection
