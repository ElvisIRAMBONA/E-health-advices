<?php


namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Other middleware groups here...

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'role' => \App\Http\Middleware\RoleMiddleware::class,
        'isAdmin' => \App\Http\Middleware\IsAdmin::class,
    ];
}