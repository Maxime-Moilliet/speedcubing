<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Session;
use App\Models\Time;

readonly class CalculateTimeAverageService
{
    public function __construct(private Session $session)
    {
    }

    public function calculate(): int|float
    {
        $allTime = $this->session->times->reduce(fn (float $sum, Time $time) => $time->getFinalTime() ? $sum + $time->getFinalTime() : $sum, 0);

        if ($this->session->times_count) {
            return round($allTime / $this->session->times_count, 2);
        }

        return 0;
    }
}
