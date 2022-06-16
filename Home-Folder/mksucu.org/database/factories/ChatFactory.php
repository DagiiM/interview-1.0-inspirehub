<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Chat;
use App\Models\Ministry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ChatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
  protected $model = Chat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message' => $this->faker->paragraph(3),
            'status'=>$this->faker->randomElement([Chat::AVAILABLE_CHAT,Chat::UNAVAILABLE_CHAT]),
            'attachment'=>$this->faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg']),
            'sender_id'=>User::all()->random()->id,
            'ministry_id'=>Ministry::factory(),
            'Expiration_date'=>Carbon::now()->addDays(7),
        ];
    }
}
