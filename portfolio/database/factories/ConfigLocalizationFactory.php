<?php

namespace Database\Factories;

use App\Models\ConfigLocalization;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigLocalizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConfigLocalization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' =>  $this->faker->paragraph,
            'h1'=>  $this->faker->sentence,
        ];
    }
}
