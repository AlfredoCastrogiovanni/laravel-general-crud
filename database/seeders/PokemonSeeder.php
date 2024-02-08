<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/pokemons.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Pokemon::create([
                    "name" => $data['1'],
                    "type_1" => $data['2'],
                    "type_2" => $data['3'],
                    "hit_points" => $data['4'],
                    "attack" => $data['5'],
                    "defense" => $data['6'],
                    "special_attack" => $data['7'],
                    "special_defense" => $data['8'],
                    "speed" => $data['9'],
                    "generation" => $data['10'],
                    "legendary" => $data['11'] == 'TRUE' ? 1 : 0,
                    "evolves_from_id" => $data['12'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
