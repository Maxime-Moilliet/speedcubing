<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Time::factory(50)->create();
    }
}
