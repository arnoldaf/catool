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
        $clientDomain = str_replace(['http://', 'https://'], '', $request->root());
        $clientInfo = UserDomainConfig::where('domain_name', $clientDomain)->first();
        
        \Session::put('client','james');
        \Session::save();
        return $next($request);
    }
}
