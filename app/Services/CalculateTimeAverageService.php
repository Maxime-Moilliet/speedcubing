<?php

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
        $allTime = $this->session->times->reduce(fn (float $sum, Time $time) => $sum + $time->getFinalTime(), 0);

        if ((bool) $this->session->times_count) {
            return round($allTime / $this->session->times_count, 2);
        }

        return 0;
    }
}
