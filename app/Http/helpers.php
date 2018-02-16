<?php

if (!function_exists('setClientConfData')) {

    function setClientConfData() {
        $clientDomain = str_replace(['http://', 'https://'], '', app('Illuminate\Http\Request')->root());
        $clientInfo = app('App\UserDomainConfig')->where('domain_name', $clientDomain)->first();
        session([
            'client_id' => empty($clientInfo->user_id) ? 0 : $clientInfo->user_id,
            'brand_name' => empty($clientInfo->brand_name) ? env('BRAND_NAME') : $clientInfo->brand_name
        ]);
    }

}

if (!function_exists('getMenu')) {

    function getMenu() {
        $loggedUser = \Illuminate\Support\Facades\Auth::User();
        $menuItem = [];
        if ($loggedUser) {
            //$menus = app('App\MenuSetting')->where(['role_id' => $loggedUser->role_id, 'status' => 1])->get();
            $menus = app('App\MenuSetting')->getMenu($loggedUser->role_id);
            
            foreach ($menus as $menu) {
                if ($menu->p_id == 0) {
                    $menuItem[$menu->id] = $menu->toArray();
                }
                if ($menu->p_id > 0) {
                    $menuItem[$menu->p_id]['sub_menu'][] = $menu->toArray();
                }
            }
        }
       
        return $menuItem;
    }

}

function setMenu() {
    $menus = getMenu();
}