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
        $pokemons = Pokemon::all();
        return view('pages.pokemons.index', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pokemons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['legendary'] = isset($data['legendary']);

        $newPokemon = Pokemon::create($data);
        return redirect()->route('pokemons.show', $newPokemon->id);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
    }
}
