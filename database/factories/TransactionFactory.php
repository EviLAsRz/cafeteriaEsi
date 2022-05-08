<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $order = Order::factory()->times(1)->create()->first();
        return [
            'order_id' => $order->id,
            // change 'final_amount' value manually after creation of cart items with this code:
            // $transactions = Transaction::all();
            // foreach ($transactions as $t) {
            //     $t->final_amount = $t->order->getTotalFromScratch();
            //     $t->save();
            // }
            // just change in tinker will do
            'final_amount' => $this->faker->randomFloat(2, 1, 999),
            'created_at' => $order->dateTime,
        ];
    }
}
