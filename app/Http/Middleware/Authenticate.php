<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Check if the request URI starts with '/admin'
        if ($request->is('admin/*')) {
            return route('admin.login'); // Redirect to admin login
        } else {
            return route('login'); // Redirect to regular user login
        }
    }
}
