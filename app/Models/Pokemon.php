<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';
    protected $fillable = [
        "name",
        "type_1",
        "type_2",
        "hit_points",
        "attack",
        "defense",
        "special_attack",
        "special_defense",
        "speed",
        "generation",
        "legendary",
        "evolves_from_id"
    ];
}
