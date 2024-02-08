<?php

declare(strict_types=1);

namespace App\Http\Controllers\Time;

use App\Http\Controllers\Controller;
use App\Models\Time;
use Illuminate\Http\RedirectResponse;

class DestroyTimeController extends Controller
{
    public function __invoke(Time $time): RedirectResponse
    {
        $time->delete();

        return redirect()->back();
    }
}
