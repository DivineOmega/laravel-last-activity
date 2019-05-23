<?php

namespace DivineOmega\LaravelLastActivity\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LastActivity
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            $lastActivityField = config('last-activity.field');

            /** @var Model $user */
            $user = Auth::guard($guard)->user();
            $user->$lastActivityField = now();
            $user->save();
        }

        return $next($request);
    }
}