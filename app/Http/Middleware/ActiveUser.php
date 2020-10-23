<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActiveUser
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $expire= Carbon::now()->addMinutes(2);
            Cache::put('user-onLine-'.Auth::user()->id,true,$expire);
        }
        return $next($request);
    }
}
