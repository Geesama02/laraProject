<?php

namespace Database\Factories;

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
            'nom_arabe'=> fake()->regexify('[A-Z]{2}[0-9]{8}'),
            'nom_francaise'=> fake()->firstName(),
            'prenom_arabe'=> fake()->lastName(),
            'prenom_francaise'=> fake()->email(),
            'sexe'=> fake()->randomElement(['mâle', 'femme']),
            'endecapé'=> fake()->boolean(),
        ];
    }
}
