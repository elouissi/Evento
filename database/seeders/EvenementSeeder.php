<?php

namespace Database\Seeders;

use App\Models\Evenement;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvenementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Evenement::factory(10)->create(); // Utilisez Evenement::factory() pour créer 10 événements
    }
}
