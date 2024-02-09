<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/pokemons/deleted', [PokemonController::class, 'deletedPokemons'])->name('pokemons.deleted');
Route::post('/pokemons/deleted', [PokemonController::class, 'restorePokemon'])->name('pokemons.restore');
Route::delete('/pokemons/remove', [PokemonController::class, 'permanentDestroy'])->name('pokemons.remove');
route::resource('pokemons', PokemonController::class);
