<?php

declare(strict_types=1);

namespace App\Http\Controllers\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\Time\TimeRequest;
use App\Models\Time;
use Illuminate\Http\RedirectResponse;

class StoreTimeController extends Controller
{
    public function __invoke(TimeRequest $request): RedirectResponse
    {
        Time::create($request->validated());

        return redirect()->back();
    }
}
