<?php

namespace DivineOmega\LaravelLastActivity\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LastActivity
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user) {
            $this->updateLastActivityField($user);
        }

        return $next($request);
    }

    /**
     * Updates the last activity field for a specified model.
     *
     * @param Model $user
     */
    private function updateLastActivityField(Model $user)
    {
        $lastActivityField = config('last-activity.field');

        $this->hideFromEvents($user, function() use ($user, $lastActivityField) {
            $user->$lastActivityField = now();
            $user->save();
        });
    }

    /**
     * Hides the functionality of a specified callback from the event dispatcher
     * of the specified modal. This prevents triggering model events and/or observers.
     *
     * @param Model $model
     * @param callable $callback
     * @return mixed
     */
    private function hideFromEvents(Model $model, callable $callback)
    {
        $dispatcher = $model::getEventDispatcher();
        $model::unsetEventDispatcher();

        $result = $callback();

        $model::setEventDispatcher($dispatcher);

        return $result;
    }
}