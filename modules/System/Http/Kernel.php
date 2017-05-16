<?php namespace Modules\System\Http;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Router;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [ ];

    protected $middlewareGroups = [
        'backend'   => [
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Modules\Backend\Http\Middleware\Authenticate::class
        ]
    ];

    public function __construct(Application $app, Router $router)
    {
        parent::__construct($app, $router);
    }
}
