@extends('Admins.indexAdmin')
@section('content')
    <br />
    <br />
    <br />
    <div class="container">
        <br />
        <br />
        <br />
        @if ($reservations)
            @foreach ($reservations as $item)
                <div class="card w-75 mb-3" style="width: 18rem; background-color:gray;color:black">
                    <div class="card-body">
                        <h5 class="card-title" style="color:black;font-size:2em">{{ $item->nom }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary" style="color:burlywood">{{ $item->phone }} </h6>
                        <p class="card-text">{{ $item->email }}.</p>
                        <p class="card-link">nombre de personne: {{ $item->gens }}</p>
                        <hr>
                        <p class="card-link">{{ $item->date }} {{ $item->heure }} </p>
                    </div>
                </div>
                <br />
                <br />
            @endforeach
        @else
            <h2>aucun reservation</h2>
        @endif
    </div>
@endsection
