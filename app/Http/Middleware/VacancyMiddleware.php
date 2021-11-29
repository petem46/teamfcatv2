<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use App\User;

class VacancyMiddleware
{

  public function handle($request, Closure $next)
  {
    $user = User::with('role')->where('id', Auth::id())->first();
    if ($user) {
      $rolesLength = count($user->role);
      for ($x = 0; $x < $rolesLength; $x++) {
        if (str_starts_with($user->role[$x]['role'], 'HR Lead')) {
          return $next($request);
        }
      }
    }
    return redirect(route('home'))->with('warning', 'No Access Permission');
    return 'GET OUT';
  }
}
