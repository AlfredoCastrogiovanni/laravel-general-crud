@extends('layouts.app')

@section('title', 'All Pokemons')

@section('main-content')
    <div class="container mt-5">
        <form class="row g-3" action="{{ route('pokemons.update', $pokemon) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $pokemon->name) }}">
            </div>
            <div class="col-3">
                <label for="type_1" class="form-label">Type 1</label>
                <input type="text" class="form-control" name="type_1" id="type_1" value="{{ old('type_1', $pokemon->type_1) }}">
            </div>
            <div class="col-3">
                <label for="type_2" class="form-label">Type 2</label>
                <input type="text" class="form-control" name="type_2" id="type_2" value="{{ old('type_2', $pokemon->type_2) }}">
            </div>
            <div class="col-3">
                <label for="hit_points" class="form-label">Hit Points</label>
                <input type="text" class="form-control" name="hit_points" id="hit_points" value="{{ old('hit_points', $pokemon->hit_points) }}">
            </div>
            <div class="col-3">
                <label for="attack" class="form-label">Attack</label>
                <input type="text" class="form-control" name="attack" id="attack" value="{{ old('attack', $pokemon->attack) }}">
            </div>
            <div class="col-3">
                <label for="defense" class="form-label">Defense</label>
                <input type="text" class="form-control" name="defense" id="defense" value="{{ old('defense', $pokemon->defense) }}">
            </div>
            <div class="col-3">
                <label for="special_attack" class="form-label">Special Attack</label>
                <input type="text" class="form-control" name="special_attack" id="special_attack" value="{{ old('special_attack', $pokemon->special_attack) }}">
            </div>
            <div class="col-3">
                <label for="special_defense" class="form-label">Special Defense</label>
                <input type="text" class="form-control" name="special_defense" id="special_defense" value="{{ old('special_defense', $pokemon->special_defense) }}">
            </div>
            <div class="col-3">
                <label for="speed" class="form-label">Speed</label>
                <input type="text" class="form-control" name="speed" id="speed" value="{{ old('speed', $pokemon->speed) }}">
            </div>
            <div class="col-3">
                <label for="generation" class="form-label">Generation</label>
                <input type="text" class="form-control" name="generation" id="generation" value="{{ old('generation', $pokemon->generation) }}">
            </div>
            <div class="col-3">
                <label for="evolves_from_id" class="form-label">Evolves From ID</label>
                <input type="text" class="form-control" name="evolves_from_id" id="evolves_from_id" value="{{ old('evolves_from_id', $pokemon->evolves_from_id) }}">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="legendary" name="legendary" @checked(old( 'legendary', $pokemon->legendary ))>
                    <label class="form-check-label" for="legendary">
                        Legendary
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection