<?php

declare(strict_types=1);

namespace App\Models;

use App\Services\CalculateTimeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Time extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_incomplete' => 'boolean',
        'is_dnf' => 'boolean',
    ];

    public function getFinalTime(): float|int
    {
        return (new CalculateTimeService($this))->calculate();
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(Time::class);
    }
}
