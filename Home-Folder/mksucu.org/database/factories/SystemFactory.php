<?php

namespace Database\Factories;

use App\Models\System;
use Illuminate\Database\Eloquent\Factories\Factory;

class SystemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
  protected $model = System::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'application_name' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'vision' => $this->faker->sentence(6),
            'mission' => $this->faker->sentence(8),
            'semester_theme' => $this->faker->sentence(8),
            'values' => $this->faker->sentence(8),
            'description' => $this->faker->paragraph(1),

        ];
    }
}
