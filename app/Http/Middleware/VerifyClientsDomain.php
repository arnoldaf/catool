<?php

namespace App\Http\Middleware;

use App;
use Closure;
use App\UserDomainConfig;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyClientsDomain {

    /**
     * to verify clients from url
     * @var array
     */
    public function handle($request, Closure $next) {
        if ($request->header('authorization') != null) {
            //to get client from domain
            $token = trim(str_replace('Bearer', '', $request->header('authorization')));
            $loggedIn = JWTAuth::authenticate($token);
            if ($loggedIn && $loggedIn->role_id > 0) {
                $pId = $loggedIn->p_id;
                $clientDomain = (!$request->header('domain')) ? env('DEFAULT_DOMAIN', 'localhost:4200') : str_replace(['http://', 'https://'], '', $request->header('domain'));
                $clientInfo = UserDomainConfig::whereIn('user_id', [$loggedIn->id, $pId])
                        ->where('domain_name', $clientDomain)
                        ->first();
                if (!$clientInfo) {
                    return response()->json(['error' => ['user' => trans('User not found')]], 404);
                }
            }
        }
        return $next($request);
    }

}
