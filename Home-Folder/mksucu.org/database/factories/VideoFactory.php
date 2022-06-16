<?php

namespace Database\Factories;

use App\Models\Video;
use App\Models\Ministry;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
  protected $model = Video::class;

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
            'ministry_id'=>Ministry::factory(),
            'description' => $this->faker->paragraph(2),
            'poster'=>$this->faker->sentence(8),
           // 'poster'=>$this->faker->randomElement(['cu1.jpeg','cu2.jpeg','cu3.jpeg','cu4.jpeg']),
        ];
    }
}
