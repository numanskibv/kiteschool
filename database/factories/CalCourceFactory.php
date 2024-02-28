<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalCource>
 */
class CalCourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('role', 'client')->inRandomOrder()->first();
        $instructor = User::where('role', 'instructor')->inRandomOrder()->first();


        return [
            'book_date' => $this->faker->dateTimeBetween('now', '+2 years'),
            'client_id' => $user->id,
            'instructor_id' => $instructor->id,
            'course_id' => $this->faker->numberBetween(1, 4),
            'location_id' => $this->faker->numberBetween(1, 3),
            'start_time' => '08:00',
            'end_time' => '17:00',
            'status' => $this->faker->randomElement(['open', 'booked', 'canceled']),
        ];
    }
}
