<?php namespace Modules\Backend\Http\Middleware;

use Closure;
use BackendAuth;
use Backend;

use Illuminate\Support\Facades\Auth;

class Authenticate {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null )
    {
        if( $request->getPathInfo() == '/backend/auth/login' ) {
            return $next( $request );
        }

        if (Auth::guard('backend')->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return Backend::redirectIntended('auth/login');
            }
        }

        return $next($request);
    }
}
