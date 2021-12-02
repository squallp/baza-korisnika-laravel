<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Klijenti;
use App\Models\Kvar;
class KvarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'imeMajstora' => $this->faker->name(),
            'modelAuta' => $this->faker->randomElement(['Mercedes', 'BMW', 'Skoda', 'Audi']),
            'registarskeTablice'=> $this->faker->numberBetween(900000, 100000),
            'comment' => $this->faker->sentence(),
            'simptom' => $this->faker->sentence(),
            'dijagnoza' => $this->faker->sentence(),
            'izvrsenePopravke' => $this->faker->sentence(),
            'klijentID' => Klijenti::factory()
        ];
    }
}
