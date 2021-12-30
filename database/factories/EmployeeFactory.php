<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'position_id' => \App\Models\Position::inRandomOrder()->first()->id,
            'nik' => $this->faker->numerify('################'),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'gender' => $this->faker->randomElement(['Pria', 'Wanita']),
            'active' => true
        ];
    }
}
