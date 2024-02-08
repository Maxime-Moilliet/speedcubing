<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Session;
use App\Models\Time;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Session::factory(5)
            ->has(Time::factory()->count(20))
            ->create();
    }
}
