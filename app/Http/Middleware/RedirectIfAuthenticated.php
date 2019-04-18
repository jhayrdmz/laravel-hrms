<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated {

  public function handle($request, Closure $next, $guard = null) {
    if (Auth::guard($guard)->check()) {
      if($request->user()->hasRole('employee')) {
        return redirect('/');
      }

      return redirect('/admin');
    }

    return $next($request);
  }

}
