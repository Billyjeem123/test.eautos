<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminNotifications
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
        // Check if user is authenticated
        if (Auth::check()) {
            // Fetch notifications data
            $user = Auth::user();
            $unreadNotificationsCount = $user->unreadNotifications()->count();
            $notifications = $user->unreadNotifications;

            // Share notifications data with views
            View::share([
                'notifications' => $notifications,
                'unreadNotificationsCount' => $unreadNotificationsCount
            ]);
        } else {
            // If user is not authenticated, set notifications data to null
            View::share([
                'notifications' => null,
                'unreadNotificationsCount' => 0
            ]);
        }

        return $next($request);
    }
}
