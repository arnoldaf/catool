<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MenuSetting extends Model
{
    //
    public function getMenu($roleId = null) {
        return $this
                ->join('role_menu', 'menu_settings.id', '=', 'role_menu.menu_id')
                ->where('status', 1)
                ->where('role_menu.role_id', $roleId)
                ->get();
    }
}
