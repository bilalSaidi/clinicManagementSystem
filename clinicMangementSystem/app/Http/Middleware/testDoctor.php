<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class testDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::id();
        if($user != 1 ){
            return redirect()->route('index');
        }
        return $next($request);
    }
}
