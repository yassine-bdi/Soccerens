<?php

namespace App\Http\Middleware;

use Closure;
use App\User; 
use Illuminate\Support\Facades\Auth; 

class CheckAdmin
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
        
        if(Auth::user()->role != 'admin') {
           return  redirect('/login'); 
        }
        return $next($request);
    }
}
