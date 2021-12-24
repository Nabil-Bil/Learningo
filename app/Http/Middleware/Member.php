<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Member
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
        if(empty(Salon::findOrFail($request->id)->member->first())){
            abort(403);
        }
      
        return $next($request);
    }
}
