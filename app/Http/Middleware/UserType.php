<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $userType): Response
    {
        $user = $request->user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        $currentType = strtolower((string) ($user->user_type ?? $user->type ?? ''));
        $requiredType = strtolower(trim($userType));

        if ($currentType !== $requiredType) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
