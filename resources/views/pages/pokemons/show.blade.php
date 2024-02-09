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
        <div class="row justify-content-center align-items-center">
            <div class="col-6">
                <div class="card mb-4 border-0">
                    <img src="{{ getImage($pokemon->id) }}" class="card-img-top position-relative" alt="...">
                    <a href=" {{ route('pokemons.show', $pokemon->evolves_from_id) }}"><img src="{{ getImage($pokemon->evolves_from_id) }}" class="my_img" alt=""></a>
                </div>
            </div>

            <div class="col-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pokemon->id }} - {{ $pokemon->name }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="fw-bold">Type:</span> {{ $pokemon->type_1 }} {{ $pokemon->type_2 }}</li>
                        <li class="list-group-item"><span class="fw-bold">Hit Points:</span> {{ $pokemon->hit_points }}</li>
                        <li class="list-group-item"><span class="fw-bold">Attack:</span> {{ $pokemon->attack }}</li>
                        <li class="list-group-item"><span class="fw-bold">Defense:</span> {{ $pokemon->defense }}</li>
                        <li class="list-group-item"><span class="fw-bold">Special Attack:</span> {{ $pokemon->special_attack }}</li>
                        <li class="list-group-item"><span class="fw-bold">Special Defense:</span> {{ $pokemon->special_defense }}</li>
                        <li class="list-group-item"><span class="fw-bold">Speed:</span> {{ $pokemon->speed }}</li>

                        <li class="list-group-item"><span class="fw-bold">Generation:</span> {{ $pokemon->generation }}</li>
                        <li class="list-group-item"><span class="fw-bold">Legendary:</span> {{ $pokemon->legendary ? 'yes' : 'NO' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection