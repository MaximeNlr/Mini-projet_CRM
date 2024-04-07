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
    <tr>
        <td>{{ $prospect->nom }}</td>
        <td>{{ $prospect->prenom }}</td>
        <td>{{ $prospect->email }}</td>
        <td>{{ $prospect->tel }}</td>
        <td>{{ $prospect->dateNaissance }}</td>
        <td>{{ $prospect->besoin }}</td>
        <td>
            <div class="actionTd">
                <a href="{{ route('prospects.index', ['prospect' => $prospect->id]) }}">🏠</a>
                <a href="{{ route('prospects.edit', ['prospect' => $prospect->id]) }}">✏️</a>
                <form method="POST" action="{{ route('prospects.destroy', ['prospect' => $prospect->id]) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="🚮"/>
                </form>
            </div>
        </td>
    </tr>
</table>

@endsection