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
            $session->load('times')->loadCount(['times' => fn ($query) => $query->where('is_dnf', false)]) :
            Session::with('times')->withCount(['times' => fn ($query) => $query->where('is_dnf', false)])->first();

        return view('welcome', [
            'scramble' => (new ScrambleService)->generate(),
            'session' => $session,
            'sessions' => Session::get(),
            'average' => (new CalculateTimeAverageService($session))->calculate(),
        ]);
    }
}
