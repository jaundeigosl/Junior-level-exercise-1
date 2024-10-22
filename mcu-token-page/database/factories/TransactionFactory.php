<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'sender_id' => fake()->numberBetween(1,11),
            'purpose' => fake()->text(),
            'receiver_id' => fake()->numberBetween(1,11),
            'amount_transfered' => fake()->numberBetween(1,1000)
         ];
    }
}
