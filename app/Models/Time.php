<?php

declare(strict_types=1);

namespace App\Models;

use App\QueryBuilders\Time\TimeQueryBuilder;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    /**
     * @param $query
     * @return TimeQueryBuilder<Time>
     */
    public function newEloquentBuilder($query): TimeQueryBuilder
    {
        return new TimeQueryBuilder($query);
    }

    protected function time(): Attribute
    {
        return Attribute::make(
            get: fn(int $time) => number_format($time / 100, 2),
            set: fn(float $time) => $time * 100,
        );
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(Time::class);
    }
}
