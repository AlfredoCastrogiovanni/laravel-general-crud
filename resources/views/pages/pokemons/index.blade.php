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
    <div class="row mt-3">
        <div class="col-6 offset-6 text-end">
            <a class="btn btn-success me-3" href="{{ route('pokemons.create') }}">Create Pokemon</a>
        </div>
    </div>
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
                        <div class="card-body">
                            <a href="{{ route('pokemons.show', $pokemon) }}" class="btn btn-primary">See Details</a>
                            <a href="{{ route('pokemons.edit', $pokemon) }}" class="btn btn-warning">Edit</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{ '#modal' . $pokemon->id}}">Delete</button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="{{ 'modal' . $pokemon->id}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabel">Delete</h1>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want delete the {{ $pokemon->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('pokemons.destroy', $pokemon) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection