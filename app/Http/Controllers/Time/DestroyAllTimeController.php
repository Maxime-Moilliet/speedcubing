<?php

declare(strict_types=1);

namespace App\Http\Controllers\Time;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\RedirectResponse;

class DestroyAllTimeController extends Controller
{
    public function __invoke(Session $session): RedirectResponse
    {
        $session->times()->delete();

        return redirect()->back();
    }
}
