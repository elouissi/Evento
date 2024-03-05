<?php

namespace Database\Factories;

use App\Models\Evenement;
use App\Models\User; // Importez la classe User
use App\Models\Categorie; // Importez la classe Categorie
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
      protected $model = Evenement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(),
            'lieux' => $this->faker->city,
            'titre' => $this->faker->sentence,
            'prix' => $this->faker->numberBetween(10, 100),
            'durée' => $this->faker->numberBetween(1, 24),
            'description' => $this->faker->paragraph,
            'status' => 'attend',
            'accptance' => 'auto',
            'capacity' => $this->faker->numberBetween(50, 1000),
            'tickets_vendus' => $this->faker->numberBetween(0, 50),
            'localisation' => $this->faker->address,
            'date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'organisateur' => User::factory()->create()->id,
            'categorie_id' => Categorie::factory()->create()->id,

        ];
    }

}
