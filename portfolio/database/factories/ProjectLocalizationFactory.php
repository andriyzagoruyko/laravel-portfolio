<?php

namespace Database\Factories;

use App\Models\ProjectLocalization;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectLocalizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectLocalization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(random_int(4, 7)),
            'description' => $this->faker->text(300),
        ];
    }
}
