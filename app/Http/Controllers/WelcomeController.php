<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Session;
use App\Services\CalculateTimeAverageService;
use App\Services\ScrambleService;
use Illuminate\Contracts\View\View;

class WelcomeController extends Controller
{
    public function __invoke(Session $session): View
    {
        $session = $session->exists ?
            $session->load(['times' => fn ($query) => $query->latest()])
                ->loadCount([
                    'times' => fn ($query) => $query->where('is_dnf', false),
                ]) :
            Session::with(['times' => fn ($query) => $query->latest()])
                ->withCount([
                    'times' => fn ($query) => $query->where('is_dnf', false),
                ])->first();

        return view('welcome', [
            'scramble' => (new ScrambleService)->generate(),
            'session' => $session,
            'sessions' => Session::get(),
            'average' => (new CalculateTimeAverageService(
                times: $session->times,
                times_count: $session->times_count
            ))->calculate(),
        ]);
    }
}
