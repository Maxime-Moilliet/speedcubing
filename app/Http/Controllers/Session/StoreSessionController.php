<?php

declare(strict_types=1);

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Http\Requests\Session\SessionRequest;
use App\Models\Session;
use Illuminate\Http\RedirectResponse;

class StoreSessionController extends Controller
{
    public function __invoke(SessionRequest $request): RedirectResponse
    {
        $session = Session::create($request->validated());

        return redirect()->to(route('welcome', $session));
    }
}
