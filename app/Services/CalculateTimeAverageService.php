<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Time;
use Illuminate\Support\Collection;

readonly class CalculateTimeAverageService
{
    /**
     * @param  Collection<Time>  $times
     */
    public function __construct(private Collection $times, private int $times_count)
    {
    }

    public function calculate(): int|float
    {
        $allTime = $this->times->reduce(fn (float $sum, Time $time) => $time->getFinalTime() ? $sum + $time->getFinalTime() : $sum, 0);

        if ($this->times_count) {
            return round($allTime / $this->times_count, 2);
        }

        return 0;
    }
}
