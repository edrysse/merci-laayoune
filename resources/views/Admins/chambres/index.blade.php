@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Liste des Chambres</h1>
    <a href="{{ route('chambres.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle chambre</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chambres as $chambre)
                <tr>
                    <td>{{ $chambre->nom }}</td>
                    <td>{{ $chambre->description }}</td>
                    <td><img src="{{ asset('storage/' . $chambre->image) }}" width="100"></td>
                    <td>
                        <a href="{{ route('chambres.edit', $chambre->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('chambres.destroy', $chambre->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
