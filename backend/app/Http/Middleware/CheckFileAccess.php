<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckFileAccess
{
    public function handle(Request $request, Closure $next)
    {
        $courrier = $request->route('courrier');
        $user = $request->user();

        if ($user->role === 'admin' ||
            $user->service === $courrier->service_destinataire ||
            $user->service === $courrier->service_emetteur) {
            return $next($request);
        }

        return response()->json(['message' => 'Accès non autorisé'], 403);
    }
}
