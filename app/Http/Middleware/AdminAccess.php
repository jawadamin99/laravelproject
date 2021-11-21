<?php

namespace App\Http\Middleware;

use App\Repository\AdminRepository;
use Closure;
use Illuminate\Support\Facades\Session;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $current_path = $request->path();
        $public_paths = ['login'];

        if (in_array($current_path, $public_paths)) {
            if (AdminRepository::is_logged_in()) {
                return redirect('admin/dashboard');
            }
        }
        else if (!AdminRepository::is_logged_in()) {
            Session::flash('error_message', 'You must be logged in to proceed further');
            return redirect('admin/login');
        }
        return $next($request);
    }
}
