<?php

namespace Database\Factories\Api;

use App\Models\Api\Location;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Api\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $nigerian = [
            'LAG',
            'ABJ',
            'IBD',
            'KAN',
            'PHC',
            'ENU',
            'BEN',
            'JOS',
            'ABK',
            'ONI',
            'UYO',
            'CAL',
            'KAD',
            'MAI',
            'WAR',
            'OWE',
            'ILO',
            'OSO',
            'MAK',
            'MIN',
            'BAU',
            'GOM',
            'EKI',
            'ASA'
        ];
        $branch = [
            'Mandelas Island',
            'Trade Fair'
        ];
        $city = fake()->randomElement($nigerian);
        $date = fake()->randomNumber(4, true);
        $shipmentNumber = $city . '-' . fake()->randomNumber(3, true) . '-' . $date;

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'shipment_number' => $shipmentNumber,
            'gen_code' => "$city-$date",
            'item' => fake()->words(3, true),
            'location_id' => Location::inRandomOrder()->first()->id,
            'sender_phone' => fake()->phoneNumber(),
            'sender_name' => fake()->words(2, true),
            'receiver_phone' => fake()->phoneNumber(),
            'receiver_name' => fake()->words(2, true),
            'amount' => fake()->numberBetween(1000, 10000),
            'volume' => fake()->numberBetween(10, 50) . ' X ' . fake()->numberBetween(10, 50) . ' X ' . fake()->numberBetween(10, 50),
            'branch' => fake()->randomElement($branch),
            'payment_mode' => fake()->randomElement(['cash', 'transfer', 'debit']),
            'created_at' => Carbon::create(2025, 1, 1)->addDays(fake()->numberBetween(0, 37)),
            'updated_at' => Carbon::create(2025, 1, 1)->addDays(fake()->numberBetween(0, 37)),
        ];
    }
}
