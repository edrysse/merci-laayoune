@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Liste des Réservations de Chambres</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nom du Client</th>
                <th>Chambre</th>
                <th>Date de Réservation</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->client->nom }}</td>
                    <td>{{ $reservation->chambre->nom }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
