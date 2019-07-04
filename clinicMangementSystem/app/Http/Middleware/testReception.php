<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class testReception
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
        if($user != 2 ){
            return redirect()->route('index');
        }
        return $next($request);
    }
}
