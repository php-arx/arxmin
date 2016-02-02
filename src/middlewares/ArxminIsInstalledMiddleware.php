<?php namespace Arxmin\middlewares;

use Arxmin\Arxmin;

class ArxminIsInstalledMiddleware
{
    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     */
    public function __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!Arxmin::isInstalled()) {
            return "You should run php artisan arxmin:install first";
        }

        return $next($request);
    }
}