<?php

namespace Database\Factories;

use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activete>
 */
class ActiveteFactory extends Factory
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
            'titre'=> fake()->jobTitle(),
            'description'=> fake()->sentence(5),
            'club_id'=>Club::inRandomOrder()->first(),


        ];
    }
}
