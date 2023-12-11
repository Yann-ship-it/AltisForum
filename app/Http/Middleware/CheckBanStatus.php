<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Ban;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CheckBanStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Vérifiez si un utilisateur est déjà authentifié
        if (Auth::check()) {
            $user = Auth::user();

            // Si l'utilisateur est authentifié et banni, redirigez-le vers une page "banned"
            if ($this->isBanned($user->id)) {
                return new RedirectResponse(route('banned'));
            }
        }

        return $next($request);
    }

    private function isBanned($userId)
    {

        return Ban::where('user_id', $userId)->exists();
    }

}