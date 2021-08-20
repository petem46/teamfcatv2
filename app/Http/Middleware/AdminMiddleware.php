<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use App\User;

class AdminMiddleware
{

  public function handle($request, Closure $next)
  {
    $user = User::with('role')->where('id', Auth::id())->first();
    if ($user) {
      $rolesLength = count($user->role);
      for ($x = 0; $x < $rolesLength; $x++) {
        if ($user->role[$x]['role'] === "Site Admin") {
          return $next($request);
        }
      }
    }
    return redirect(route('home'))->with('warning', 'No Access Permission');
  }
}
