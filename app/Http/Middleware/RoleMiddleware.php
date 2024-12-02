<?php

// app/Http/Middleware/RoleMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->user() || !auth()->user()->hasRole($role)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}
