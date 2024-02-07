<?php

declare(strict_types=1);

namespace App\Http\Controllers\Times;

use App\Http\Controllers\Controller;
use App\Models\Time;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class StoreTimeController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        Time::create([
            'time' => floatval($request->post('time')),
            'scramble' => $request->post('scramble'),
            'is_incomplete' => false,
            'is_dnf' => false,
        ]);

        return redirect()->back();
    }
}
