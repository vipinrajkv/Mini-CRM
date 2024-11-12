<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contact_name'          => fake()->name(),
            'contact_email'         => fake()->unique()->safeEmail(),
            'contact_phone_number'  => fake()->phoneNumber(),
            'client_name'           => fake()->company(),
            'client_address'        => fake()->address(),
            'client_city'           => fake()->city(),
            'client_post'           => fake()->postcode(),
            'gst_no'                => fake()->regexify('[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[0-9]{1}[A-Z]{1}[0-9]{1}'),
        ];
    }
}
