<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $data = $request->all();
        $data['legendary'] = isset($data['legendary']);

        $pokemon->update($data);
        return redirect()->route('pokemons.show', $pokemon);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();

        return redirect()->route('pokemons.index');
    }

    public function deletedPokemons()
    {
        $pokemons = Pokemon::onlyTrashed()->orderBy('id', 'DESC')->get();
        return view('pokemons.deleted', compact('pokemons'));
    }

    public function restorePokemon(Pokemon $pokemon)
    {
        Pokemon::withTrashed()->find($pokemon->id)->restore();
        $pokemons = Pokemon::onlyTrashed()->orderBy('id', 'DESC')->get();
        return view('pokemons.deleted', compact('pokemons'));
    }
}
