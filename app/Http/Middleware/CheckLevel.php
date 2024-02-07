<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use Symfony\Component\HttpFoundation\Response;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  public function handle($request, Closure $next, ...$levels)
{
    $user = Auth::admin();

    if (in_array($user->level, $levels)) {
        return $next($request);
    }

    // Redirect atau tolak akses jika tidak sesuai level
    return redirect('/');
}

}
