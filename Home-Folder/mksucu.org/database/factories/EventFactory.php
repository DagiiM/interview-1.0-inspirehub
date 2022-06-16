<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
  protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(2),
            'url' => $this->faker->url(),
           // 'url' => $this->faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg']),
        ];
    }
}
