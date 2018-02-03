<?php
if (!function_exists('setClientConfData')) {
    function setClientConfData()
    {
        $clientDomain = str_replace(['http://', 'https://'], '', app('Illuminate\Http\Request')->root());
        $clientInfo = app('App\UserDomainConfig')->where('domain_name', $clientDomain)->first();
        session([
            'client_id' => empty($clientInfo->user_id) ? 0 : $clientInfo->user_id,
            'brand_name' => empty($clientInfo->brand_name) ? env('BRAND_NAME') : $clientInfo->brand_name
        ]);
    }
}


