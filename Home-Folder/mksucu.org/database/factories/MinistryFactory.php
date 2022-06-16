<?php

namespace Database\Factories;

use App\Models\Ministry;
use Illuminate\Database\Eloquent\Factories\Factory;

class MinistryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
  protected $model = Ministry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(2),
            'image'=>$this->faker->sentence(10),
        ];
    }
}
