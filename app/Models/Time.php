<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = ['time', 'scramble', 'is_incomplete', 'is_dnf'];

    protected $casts = [
        'is_incomplete' => 'boolean',
        'is_dnf' => 'boolean',
    ];

    protected function time(): Attribute
    {
        return Attribute::make(
            get: static fn (int $time) => $time / 100,
            set: static fn (float $time) => $time * 100,
        );
    }
}
