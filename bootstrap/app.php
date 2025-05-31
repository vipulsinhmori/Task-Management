<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckUserStatus;
use App\Http\Middleware\CheckLogin;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //   $middleware->append(CheckUserStatus::class);
        //   $middleware->append(CheckLogin::class);
          $middleware->appendToGroup('Auth',[CheckUserStatus::class,CheckLogin::class]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
    })->create();



    