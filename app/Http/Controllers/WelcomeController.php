<?php

namespace App\Http\Controllers;

use App\Services\ScrambleService;
use Illuminate\Contracts\View\View;

class WelcomeController extends Controller
{
    public function __invoke(ScrambleService $scrambleService): View
    {
        return view('welcome', [
            'scramble' => $scrambleService->generate(),
        ]);
    }
}
