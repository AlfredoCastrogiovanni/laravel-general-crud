@extends('layouts.app')

@section('title', 'All Pokemons')

@section('main-content')
    @php
    function getImage($id){
        if(strlen($id) == 1){
            return "https://www.serebii.net/pokemon/art/00{$id}.png";
        }elseif(strlen($id) == 2){
            return "https://www.serebii.net/pokemon/art/0{$id}.png";
        }else{
            return "https://www.serebii.net/pokemon/art/{$id}.png";
        }
    }
    @endphp
    <div class="container mt-5">
        <div class="row">
            @foreach ($pokemons as $pokemon)
                <div class="col-4">
                    <div class="card mb-4">
                        <img src="{{ getImage($pokemon->id) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pokemon->id }} - {{ $pokemon->name }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="fw-bold">Type:</span> {{ $pokemon->type_1 }} {{ $pokemon->type_2 }}</li>
                            <li class="list-group-item"><span class="fw-bold">Generation:</span> {{ $pokemon->generation }}</li>
                            <li class="list-group-item"><span class="fw-bold">Legendary:</span> {{ $pokemon->legendary ? 'yes' : 'NO' }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection