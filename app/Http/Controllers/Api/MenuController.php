<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\MenuSetting;
use Tymon\JWTAuth\Facades\JWTAuth;

class MenuController extends ApiController {

    /**
     * To get Menu Items
     * @return type
     */
    public function getMenus(Request $request) {
        $menuItems = [];
        //to get role id of logged in user
        $token = str_replace('Bearer ',  '', $request->header('Authorization'));
        $user = JWTAuth::authenticate($token);
        $menus = (new MenuSetting)->getMenu($user->role_id == null ? 0 : $user->role_id);
        
        
        foreach ($menus as $menu) {
            if ($menu->p_id == 0) {
                $menuItems[$menu->id] = $menu->toArray();
            }
            if ($menu->p_id > 0) {
                $menuItems[$menu->p_id]['sub_menu'][] = $menu->toArray();
            }
        }
        foreach($menuItems as $key => $menuItem) {
            if(!isset($menuItem['sub_menu'])) {
                $menuItems[$key]['sub_menu'] = [];
            }
        }

       
//        $errors = [
//            'email' => 'invailid email',
//            'first_name' => 'Numbers not allowed'
//        ];
//        $this->setErrorMessage($errors);
        
        $this->setResponseData(array_values($menuItems));
        
        return $this->respond();
    }
}
