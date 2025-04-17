<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'release' => $this->faker->date(),
            'duration' => $this->faker->numberBetween(60, 180),
            'actors' => $this->faker->name(),
            'directors' => $this->faker->name(),
            'poster_url' => $this->faker->imageUrl(640, 480, 'movies', true),
            'trailer_url' => $this->faker->url(),
            'backdrop_url' => $this->faker->imageUrl(1280, 720, 'movies', true),
            'rating' => $this->faker->randomFloat(1, 0, 10),
            'is_hot' => $this->faker->boolean(),
        ];
    }
}
