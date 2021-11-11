<?php

namespace App\Http\Middleware;

use App\Repository\UserRepository;
use Illuminate\Support\Facades\Session;
use Closure;

class WebLoggedInUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!UserRepository::is_logged_in()) {
            Session::flash('error_message', 'You must be logged in to proceed further');
            return redirect('/login');
        }
        return $next($request);
    }
}
