<?php

declare(strict_types=1);

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\RedirectResponse;

class DestroySessionController extends Controller
{
    public function __invoke(Session $session): RedirectResponse
    {
        $session->delete();

        return redirect()->to(route('welcome'));
    }
}
