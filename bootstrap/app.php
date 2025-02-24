<?php
<<<<<<< HEAD

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

=======
   
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
   
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
<<<<<<< HEAD
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
=======
        $middleware->alias([
            'permission' => \App\Http\Middleware\RolePermissionMiddleware::class,
            'check.auth' => \App\Http\Middleware\CheckAuth::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();        
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
