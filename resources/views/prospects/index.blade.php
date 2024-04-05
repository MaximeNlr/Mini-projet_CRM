@extends('layouts.app')

@section('content')
    <table>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Tel</th>
            <th>Date de naissance</th>
            <th>Besoin</th>
            <th>Action</th>
        </tr>
        @foreach ($prospects as $prospect)
            <tr>
                <td>{{ $prospect->nom }}</td>
                <td>{{ $prospect->prenom }}</td>
                <td>{{ $prospect->email }}</td>
                <td>{{ $prospect->tel }}</td>
                <td>{{ $prospect->dateNaissance }}</td>
                <td>{{ $prospect->besoin }}</td>
                <td>
                    <a href="{{ route('prospects.show', ['prospect' => $prospect->id]) }}">Voir</a>
                    <a href="{{ route('prospects.edit', ['prospect' => $prospect->id]) }}">Modifier</a>
                    <form method="POST" action="{{ route('prospects.destroy', ['prospect' => $prospect->id]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Supprimer"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection