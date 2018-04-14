<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
//use Tymon\JWTAuth\JWTAuth;
//use JWTAuth;

class Api {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if (!$request->header('authorization')) {
            return response()->json(['msg' => ['body' => trans('Authorisation Required'), 'type' => 'danger']], 400);
        }
        try {
            JWTAuth::parseToken()->authenticate();
            
            return $next($request);
        } catch (Exception $e) {
            return response()->json(['msg' => ['body' => trans('User not found'), 'type' => 'danger']], 404);
        }
        
    }

}
