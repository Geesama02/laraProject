<?php

namespace Database\Factories;

use App\Models\Etablissement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eleve>
 */
class EleveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'codeMassar'=> fake()->regexify('[A-Z]{1}[0-9]{8}'),
            'nom_arabe'=> fake()->firstName(),
            'nom_francaise'=> fake()->firstName(),
            'prenom_arabe'=> fake()->lastName(),
            'prenom_francaise'=> fake()->lastName(),
            'niveau_scolaire'=> fake()->randomElement(['1-primaire', '2-primaire','3-primaire','4-primaire','5-primaire','6-primaire', '1-college', '2-college', '3-college', '1-lycee', '2-lycee', '3-lycee']),
            'sexe'=> fake()->randomElement(['mâle', 'femme']),
            'endecapé'=> fake()->boolean(),
            'etablissement_id'=>Etablissement::inRandomOrder()->first(),

        ];
    }
}
