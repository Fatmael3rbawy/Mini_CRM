<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class companyFactory extends Factory
{
    /**
     * Define the model's default state.

     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo' =>'',
            'web_url' =>$this->faker->url()
        ];
    }
}
