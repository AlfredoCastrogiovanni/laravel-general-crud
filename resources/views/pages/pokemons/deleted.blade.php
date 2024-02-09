@extends('layouts.app')

@section('title', 'All Pokemons')

@section('main-content')
    @php
        function getImage($id)
        {
            if (strlen($id) == 1) {
                return "https://www.serebii.net/pokemon/art/00{$id}.png";
            } elseif (strlen($id) == 2) {
                return "https://www.serebii.net/pokemon/art/0{$id}.png";
            } else {
                return "https://www.serebii.net/pokemon/art/{$id}.png";
            }
        }
    @endphp

    <div class="container mt-5">
        <div class="row">
            @forelse ($pokemons as $pokemon)
                <div class="col-4">
                    <div class="card mb-4">
                        <img src="{{ getImage($pokemon->id) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pokemon->id }} - {{ $pokemon->name }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="fw-bold">Type:</span> {{ $pokemon->type_1 }}
                                {{ $pokemon->type_2 }}</li>
                            <li class="list-group-item"><span class="fw-bold">Generation:</span> {{ $pokemon->generation }}
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Legendary:</span>
                                {{ $pokemon->legendary ? 'yes' : 'NO' }}</li>
                        </ul>
                        <div class="card-body">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="{{ '#modal-restore' . $pokemon->id }}">Restore</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="{{ '#modal-remove' . $pokemon->id }}">Remove</button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="{{ 'modal-restore' . $pokemon->id }}" tabindex="-1"
                            aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabel">Restore</h1>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to restore {{ $pokemon->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('pokemons.restore', $pokemon) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Restore</button>
                                        </form>

                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal 2 --}}
                        <div class="modal fade" id="{{ 'modal-remove' . $pokemon->id }}" tabindex="-1"
                            aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabel">Restore</h1>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to restore {{ $pokemon->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('pokemons.remove', $pokemon) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row justify-content-center align-items-center">
                    <h1 class="col-12 text-center">
                        No Pokemon Deleted
                    </h1>
                </div>
            @endforelse
        </div>
    </div>
@endsection
