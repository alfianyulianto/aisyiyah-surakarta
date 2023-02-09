<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsKader
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    if (Auth::guest()) {
      return redirect('/login');
    } elseif (Auth::user()->kategori_user_id == 2 || Auth::user()->kategori_user_id == 3 || Auth::user()->kategori_user_id == 4 || Auth::user()->kategori_user_id == 5) {
      return redirect('/admin');
    }
    return $next($request);
  }
}
