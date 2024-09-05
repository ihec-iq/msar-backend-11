<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InputVoucherItem>
 */
class InputVoucherItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $count = fake()->numberBetween(1, 100);
        $price = fake()->numberBetween(10000, 10000000);
        $value = $price * $count;

        return [
            'input_voucher_id' => fake()->numberBetween(1, 100),
            'item_id' => fake()->numberBetween(1, 100),
            'stock_id' => fake()->numberBetween(1, 3),
            'description' => Str::random(10),
            'employee_id' => fake()->numberBetween(1, 10),
            'count' => $count,
            'price' => $price,
            'value' => $value,
            'notes' => fake()->sentence(),
        ];
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
