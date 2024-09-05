<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Archive>
 */
class ArchiveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'issue_date' => fake()->dateTimeBetween(startDate: '-10 days', endDate: 'now'),
            'number' => fake()->numberBetween(10000, 99999),
            'way' => fake()->word(),
            'description' => fake()->sentence(),
            'is_in' => fake()->boolean(),
            'user_id' => fake()->numberBetween(1, 2),
            'section_id' => fake()->numberBetween(1, 15),
            'archive_type_id' => fake()->numberBetween(1, 14),
        ];
    }
}
