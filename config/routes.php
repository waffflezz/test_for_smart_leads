<?php

use App\Controller\RandomController;
use App\Kernel\Router\Route;

return [
    Route::get('/test', [RandomController::class, 'random'])
];