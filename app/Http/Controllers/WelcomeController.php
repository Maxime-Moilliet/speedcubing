<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Session;
use App\Services\ScrambleService;
use Illuminate\Contracts\View\View;

class WelcomeController extends Controller
{
    public function __invoke(Session $session, ScrambleService $scrambleService): View
    {
        return view('welcome', [
            'scramble' => $scrambleService->generate(),
            'session' => $session->exists ?
                $session->load(['times' => fn($query) => $query->latestTimes()]) :
                Session::with(['times' => fn($query) => $query->latestTimes()])->first(),
            'sessions' => Session::get(),
        ]);
    }
}
