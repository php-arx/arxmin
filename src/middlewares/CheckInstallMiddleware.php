<?php namespace Arxmin;

use Closure, Redirect;
use Illuminate\Contracts\Routing\Middleware;

class CheckInstallMiddleware implements Middleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        if(Arxmin::isInstalled()) {
            return Redirect::to(action('\Arxmin\ArxminController@anyLogin'));
        }

        return $next($request);
    }

}