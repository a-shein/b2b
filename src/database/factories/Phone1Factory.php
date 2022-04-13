<?php

namespace Database\Factories;

use App\Models\User1;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone1>
 */
class Phone1Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = User1::all()->pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($userIds),
            'phone' => '7900800' . $this->faker->numberBetween(1000, 9999),
        ];
    }
}
