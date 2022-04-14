<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $customerIds = Customer::all()->pluck('id')->toArray();
        return [
            'customer_id' => $this->faker->randomElement($customerIds),
            'title' => $this->faker->title(),
            'text' => $this->faker->realText(),
        ];
    }
}
