<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComplimentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "message"           => $this->faker->sentence(),
            "sender_user_id"    => User::factory(),
            "receiver_user_id"  => User::factory()
        ];
    }
}
