<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureApiTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
     public function handle(Request $request, Closure $next): Response
    {
        if (! $request->bearerToken()) {
            return response()->json([
                'message' => 'No autenticado. Debes proporcionar un token.'
            ], 401);
        }

        $user = Auth::guard('sanctum')->user();

        if (! $user) {
            return response()->json([
                'message' => 'No autenticado. El token es inválido.'
            ], 401);
        }

        $request->setUserResolver(fn () => $user);

        return $next($request);
    }
}
