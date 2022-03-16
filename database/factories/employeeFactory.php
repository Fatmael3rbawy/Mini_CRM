<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class employeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => \App\Models\company::all()->random()->id ,
            'first_name' =>$this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'linkedIn_url' =>$this->faker->url()
        ];
    }
}
