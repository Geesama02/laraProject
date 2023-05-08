<?php

namespace Database\Factories;

use App\Models\Etablissement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Professeur>
 */
class ProfesseurFactory extends Factory
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
            'ppr'=> fake()->regexify('[0-9]{8}'),
            'cin'=> fake()->regexify('[A-Z]{2}[0-9]{8}'),
            'prenom'=> fake()->firstName(),
            'nom'=> fake()->lastName(),
            'email'=> fake()->email(),
            'password'=> fake()->password(),
            'sexe'=> fake()->randomElement(['mâle', 'femme']),
            'etablissement_id'=>Etablissement::inRandomOrder()->first(),

        ];
    }
}
