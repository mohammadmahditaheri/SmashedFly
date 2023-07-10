<?php

use App\Controllers\HomeController;
use App\Controllers\PostsController;

return [
    ['GET', '/', [HomeController::class, 'index']],
    ['GET', '/posts/{id:\d+}', [PostsController::class, 'show']]
];