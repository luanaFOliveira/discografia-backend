<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'duration' => $this->faker->numberBetween(60,300),
            'album_id' => Album::factory(),
            'cover' => $this->faker->imageUrl(640, 480, 'track', true, 'Faker', true),
        ];
    }
}
