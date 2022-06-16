<?php

namespace Database\Factories;

use App\Models\Ebook;
use App\Models\Library;
use Illuminate\Database\Eloquent\Factories\Factory;

class EbookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
  protected $model = Ebook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->sentence(6),
            'url' => $this->faker->url,
            'library_id' =>Library::factory(),
        ];
    }
}
