<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User1>
 */
class User1Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $birthDate = Carbon::parse($this->faker->dateTimeBetween('-23 years', '-17 years'));
        $gender = array_rand([0, 1, 2]);
        $genderName = null;

        if ($gender === 1) {
            $genderName = 'male';
        }

        if ($gender === 2) {
            $genderName = 'female';
        }

        return [
            'name' => $this->faker->firstName($genderName),
            'gender' => $gender,
            'birth_date' => $birthDate,
        ];
    }
}
