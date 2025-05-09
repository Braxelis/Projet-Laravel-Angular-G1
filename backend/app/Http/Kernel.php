<?php

namespace App\Http;

class Kernel
{
    protected $routeMiddleware = [
        // ...existing code...
        'role' => \App\Http\Middleware\CheckRole::class,
    ];
}
