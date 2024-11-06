<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // middlewares with aliases
        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
            'updater' => \App\Http\Middleware\Updater::class,
            'creator' => \App\Http\Middleware\Creator::class,
            'deleter' => \App\Http\Middleware\Deleter::class,
        ]);        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
