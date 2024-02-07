<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Time;
use App\Services\ScrambleService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Time>
 */
class TimeFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'time' => rand(800, 3000),
            'scramble' => (new ScrambleService)->generate(),
            'is_incomplete' => fake()->boolean(10),
            'is_dnf' => fake()->boolean(10),
        ];
    }
}
