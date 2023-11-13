<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next, $roles_id)
    {
        if (!Auth::check()) {
            // Pengguna belum login, alihkan ke halaman login jika diperlukan.
            return redirect('login');
        }
    
        $user = Auth::user();
    
        if ($user->roles_id == $roles_id ) {
            return $next($request);
        }

        // Jika status atau role pengguna tidak sesuai, alihkan atau kembalikan respon sesuai kebijakan Anda.
        abort(403, 'Unauthorized');
    }
    
}
