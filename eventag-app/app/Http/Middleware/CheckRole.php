<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $requiredRole = 1)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            // Si no está logueado, redirigir al login (comportamiento estándar)
            Log::info('Acceso denegado a /event/dash: Usuario no autenticado');
            return redirect('/login');
        }
        // Verificar el rol del usuario
        $userRole = Auth::user()->rol_id;
        if ($userRole != $requiredRole) {
            // Si está logueado pero tiene rol incorrecto (ej. rol_id = 2),
            // forzar logout y redirigir al login para "mostrar el login"
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Log::warning('Acceso denegado a /event/dash: Usuario con rol_id=' . $userRole . ' (' . Auth::user()->email . ') intentado acceder. Forzando logout.');
            return redirect('/login')->withErrors([
                'email' => 'No tienes permisos para acceder a esta sección. Debes ser administrador.',
            ]);
        }
        // Si todo está bien, continuar con la ruta
        return $next($request);
    }
}
