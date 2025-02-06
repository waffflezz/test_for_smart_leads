<?php

use App\Controller\RandomController;
use App\Kernel\Router\Route;

return [
    Route::post('/random', [RandomController::class, 'random']),
    Route::get('/get', [RandomController::class, 'get']),
];