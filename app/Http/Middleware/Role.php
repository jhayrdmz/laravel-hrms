<?php

namespace App\Http\Middleware;

use Closure;

class Role {

  public function handle($request, Closure $next, ...$roles) {
    $request->user()->authorizeRoles($roles);
    return $next($request);
  }

}
