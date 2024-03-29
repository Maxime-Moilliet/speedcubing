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
        $isDnf = fake()->boolean(10);
        return [
            'time' => fake()->randomFloat(2, 8, 30),
            'scramble' => (new ScrambleService)->generate(),
            'is_incomplete' => !$isDnf && fake()->boolean(10),
            'is_dnf' => $isDnf,
        ];
    }
}
