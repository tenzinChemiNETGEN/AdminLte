<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Is_Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->roll_id != 1  ){
            // dump('is_Admin');
            // dd(auth()->user());
            return redirect()->back()->with('error',"Unauthenticated");
        }
        return $next($request);
   
        
       
   
    }
}
