<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Klijenti;
class KlijentiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'telephone'=> $this->faker->numberBetween(900000, 100000),
            'email' => $this->faker->email,
            'comment' => $this->faker->sentence(),
            'userID'=> $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
