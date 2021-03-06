<?php

namespace App\Http\Middleware;

use App\Helpers\SendsAlerts;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfUnconfirmed
{
    use SendsAlerts;

    public function handle($request, Closure $next, string $guard = null)
    {
        if (Auth::user()->isUnconfirmed()) {
            $this->error('errors.unconfirmed');

            return redirect()->home();
        }

        return $next($request);
    }
}
