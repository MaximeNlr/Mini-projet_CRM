@extends('layouts.app')

@section('content')
    <div>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Type de communication</th>
                <th>Date/Heure</th>
                <th></th>
            </tr>
            <tr>
                {{-- @foreach($messages as $message) --}}
                    <td>blabla</td>
                    <td>blabla</td>
                    <td>blabla</td>
                    <td>blabla</td>
                    <td>blabla</td>
                    <td>blabla</td>
                    <td>
                        <input type="button" value="Détails">
                        <input type="button" value="Modifier">
                        <input type="button" value="Supprimer">
                    </td>
                {{-- @endforEach --}}
            </tr>
        </table>
    </div>