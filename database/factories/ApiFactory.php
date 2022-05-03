<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ApiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'method' => 'GET',
            'structure' => json_encode([
                'first_name' => 'firstName',
                'last_name' => 'lastName',
                'state' => 'state'
            ])
        ];
    }
}
