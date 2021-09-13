<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Is_editor
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
        if(auth()->user()->roll_id != 2){
            // dump('is_editor');
            // dd(auth()->user());
            return redirect()->back()->with('error',"Unauthenticated");
        }
   
        return $next($request);
        
        // return $next($request);
    }
}
