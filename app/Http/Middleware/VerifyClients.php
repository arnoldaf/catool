<?php

namespace App\Http\Middleware;

use App;
use Closure;
use App\UserDomainConfig;
use Auth;

class VerifyClients {

    /**
     * to verify clients from url
     * @var array
     */
    public function handle($request, Closure $next) {
        //to get client from domain
        $loggedIn = Auth::user();
        if ($loggedIn && $loggedIn->role_id > 0) {
            $pId = $loggedIn->p_id;
            $clientDomain = str_replace(['http://', 'https://'], '', $request->root());

            $clientInfo = UserDomainConfig::whereIn('user_id', [$loggedIn->id, $pId])
                    ->where('domain_name', $clientDomain)
                    ->first();
            if (!$clientInfo) {
                abort(403);
            }
        }
        setMenu();
        $excludeAuth = [
            '/',
            'auth/*',
            '*/auth'
        ];
        $isValidate = true;
        foreach ($excludeAuth as $pattern) {
            if ($request->is($pattern)) {
                $isValidate = false;
            }
        }
        if (!$loggedIn && $isValidate) {
            if ($request->ajax()) {
                return response()->json(['res' => false, 'msg' => 'User must be logged in to use any other actions']);
            } else {
                return redirect(url(''));
            }
        }

        return $next($request);
    }

}
