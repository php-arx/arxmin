<?php namespace Arxmin\middlewares;

use Arxmin\Arxmin;

class ArxminIsNotInstalledMiddleware
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

        if (Arxmin::isInstalled()) {
            return redirect('arxmin/login');
        }

        return $next($request);
    }
}