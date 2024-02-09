<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Time;

class CalculateTimeService
{
    public function __construct(protected Time $time)
    {
    }

    public function calculate(): float
    {
        $timeBase = floatval($this->time->time);

        if ($this->time->is_dnf) {
            return 0;
        }

        if ($this->time->is_incomplete) {
            return $timeBase + 2;
        }

        return $timeBase;
    }
}
