<?php

namespace App\Http\Middleware;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class showNavBar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $getDealers = User::where('role', 'dealer')->take(5)->select('name', 'image')->get();
        View::share([
            'categories' => $categories,
            'brands' => $brands,
            'getDealers' => $getDealers
        ]);
        return $next($request);
    }
}
