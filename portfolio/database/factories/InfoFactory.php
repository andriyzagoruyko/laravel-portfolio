<?php

namespace Database\Factories;

use App\Models\Info;
use Illuminate\Database\Eloquent\Factories\Factory;

class InfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Info::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mail' => $this->faker->email, 
            'phone' => $this->faker->phoneNumber, 
            'telegram' => $this->faker->userName, 
            'linkedin'=> $this->faker->userName, 
            'behance'=> $this->faker->userName, 
            'github'=> $this->faker->userName
        ];
    }
}
