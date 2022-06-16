<?php

namespace Database\Factories;

use App\Models\Gallary;
use Illuminate\Database\Eloquent\Factories\Factory;

class GallaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
  protected $model = Gallary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->sentence(5),
            'url' => $this->faker->url(),
        ];
    }
}
