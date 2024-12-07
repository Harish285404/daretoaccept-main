<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'iscompleted' => \App\Http\Middleware\IsCompleted::class,
        ]);
    
        // $middleware->api(prepend: [
        //     EnsureTokenIsValid::class,
        // ]);
    })
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
