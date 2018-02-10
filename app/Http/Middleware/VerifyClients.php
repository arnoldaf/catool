<?php

namespace App\Http\Middleware;

use App;
use Closure;
use App\UserDomainConfig;

class VerifyClients
{
    /**
     * to verify clients from url
     *
     * @var array
     */
    public function handle($request, Closure $next)
    {
        //to get client from domain
        $loggedIn = \Illuminate\Support\Facades\Auth::user();
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
        
        return $next($request);
    }
}
