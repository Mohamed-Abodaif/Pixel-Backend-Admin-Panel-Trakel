<?php

use Illuminate\Console\Scheduling\Schedule;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use PixelApp\Http\Middleware\PixelMiddlewareManager;
use PixelApp\Jobs\UsersModule\AuthJobs\UserDeletableTokensHandlerJob;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void
    {   
        PixelMiddlewareManager::handlePixelAppMiddlewares($middleware);
    })
    ->withExceptions(function (Exceptions $exceptions): void{
        
    })->withSchedule(function(Schedule $schedule) : void
    {
        $schedule->call( UserDeletableTokensHandlerJob::class)->daily();
        
    })->create();
