<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activete;
use App\Models\Club;
use App\Models\Eleve;
use App\Models\Etablissement;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\
        User::factory()->create([
                'name' => 'Admin',
                'email' => 'test@example.com',
                'role' => 'admin',
            ]);
        User::factory()->create([
                'name' => 'Prof',
                'email' => 'test@prof.com',
                'role' => 'prof',
            ]);
        Etablissement::factory(10)->create();   
        Eleve::factory(700)->create();    
        Professeur::factory(50)->create();    
        Club::factory(50)->create();    
        Activete::factory(50)->create();    





    }
}
