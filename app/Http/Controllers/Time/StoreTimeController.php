<?php

declare(strict_types=1);

namespace App\Http\Controllers\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\Time\TimeRequest;
use App\Models\Session;
use App\Models\Time;
use Illuminate\Http\RedirectResponse;

class StoreTimeController extends Controller
{
    public function __invoke(Session $session, TimeRequest $request): RedirectResponse
    {
        Time::create([...$request->validated(), 'session_id' => $session->id]);

        return redirect()->back();
    }
}
