<?php

namespace Database\Factories;

use App\Models\Activete;
use App\Models\Professeur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
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
            'titre'=> fake()->sentence(1),
            'type'=> fake()->sentence(1),
            'professeur_id'=>Professeur::inRandomOrder()->first(),
        ];
    }
}
