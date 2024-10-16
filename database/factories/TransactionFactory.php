<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transaction;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'transaction_title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['successful', 'declined']),
            'total_amount' => fake()->randomFloat(2, 100, 1000),
            'transaction_number' => fake()->unique()->numerify('TRX#######'),
        ];
    }
}
