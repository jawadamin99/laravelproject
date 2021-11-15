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
        $current_path = $request->path();
        $public_paths = ['login','register', 'change_password', 'activate_account', 'forget_password', 'forget_password_handler'];

        if (in_array($current_path, $public_paths)) {
            if (UserRepository::is_logged_in()) {
                return redirect('/my_account');
            }
        }
        else if (!UserRepository::is_logged_in()) {
            Session::flash('error_message', 'You must be logged in to proceed further');
            return redirect('/login');
        }
        return $next($request);
    }
}
