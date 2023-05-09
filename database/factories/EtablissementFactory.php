<?php

namespace Database\Factories;

use App\Models\Eleve;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etablissement>
 */
class EtablissementFactory extends Factory
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
            'code_etablissement'=> fake()->numberBetween(10000,99999),
            'nom_arabe'=> fake()->sentence(1),
            'nom_francaise'=> fake()->sentence(1),

        ];
    }
}
