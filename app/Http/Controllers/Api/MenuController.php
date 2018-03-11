<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\MenuSetting;

class MenuController extends ApiController {

    /**
     * To get Menu Items
     * @return type
     */
    public function getMenus() {
        $menuItems = [];
        $menus = (new MenuSetting)->getMenu(2);
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

        return response()->json(array_values($menuItems));
    }
}
