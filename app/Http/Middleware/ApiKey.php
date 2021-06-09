<?php

namespace App\Http\Middleware;

use App\ApiData;
use Closure;
use Illuminate\Http\Request;

class ApiKey
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
        if($request->header('xpsu')==env('api_key',123456)){
            return $next($request);
        }else{
            return ApiData::F(["Api Key Not Set"],500);
        }
    }
}
