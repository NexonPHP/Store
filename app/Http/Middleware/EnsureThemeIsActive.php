<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureThemeIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Allow admin routes always
        if ($request->is('admin*')) {
            return $next($request);
        }

        $theme = app(\App\Themes\ThemeManager::class)->active();

        if (!$theme) {
            return response()
                ->view('error.no-active-theme', [], 500);
        }

        return $next($request);
    }

}
