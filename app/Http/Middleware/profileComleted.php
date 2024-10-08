<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class profileComleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return string
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if (!$user || $user->profileCompletionPercentage() < 70) {
            // Profile is not 100% complete, return an error response or redirect
            return redirect()->route('profile.incomplete', ['percentage' => $user->profileCompletionPercentage()]);

        }

        return $next($request);
    }
}
