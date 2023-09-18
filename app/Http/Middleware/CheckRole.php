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
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // Pengguna belum login, alihkan ke halaman login jika diperlukan.
            return redirect('login');
        }
    
        $user = Auth::user();
    
        if ($user->role != $role) {
            // Jika peran pengguna tidak sesuai, alihkan atau kembalikan respon sesuai kebijakan Anda.
            abort(403, 'Unauthorized');
        }
    
        return $next($request);
    }
    
}
