<?php

namespace Database\Factories;

use App\Models\Code;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CodesVisit>
 */
class CodesVisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_ip' => fake()->ipv4(),
            'user_agent' => fake()->userAgent(),
            'code_id' => Code::factory(),
            'user_id' => User::factory(),
        ];
    }
}
