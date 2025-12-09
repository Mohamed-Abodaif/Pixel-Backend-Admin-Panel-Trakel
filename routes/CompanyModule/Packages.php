<?php

use App\Http\Controllers\CompanyModule\PackageController;
use Illuminate\Support\Facades\Route;

Route::prefix('packages')
    ->controller(PackageController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{package}', 'show');
        Route::post('/', 'store');
        Route::put('/{package}', 'update');
    });
