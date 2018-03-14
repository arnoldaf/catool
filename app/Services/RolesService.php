<?php

namespace App\Services;

use Validator;
use App\Roles;
use App\RolePerm;
use App\Menu;
use DB;

class RolesService {

    public function createRolePerm($request) {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'role_id' => 'required|max:255'
                        ], [
                    'role_id.required' => 'Role is required.'
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }

        DB::table('role_menu')->where('role_id', '=', $request->input('role_id'))->delete();
        $menu_list = $request->input('menu_id');
        $values = explode(',', $menu_list);
        foreach ($values as $value) {
            $data = array("role_id" => $request->input('role_id'), "menu_id" => $value);
            DB::table('role_menu')->insert($data);
        }

        return ['result' => true, 'message' => 'Role Permission added successfully'];
    }

    public function createRole($request) {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255|unique:roles,name,' . $request->input('id')
                        ], [
                    'name.required' => 'Name is required.',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }

        $Roles = ($request->input('id') > 0 ) ? Roles::find($request->input('id')) : new Roles;
        $Roles->name = $request->input('name');
        $Roles->save();
        if ($request->input('id') > 0) {
            return ['result' => true, 'message' => 'Roles updated successfully'];
        } else {
            return ['result' => true, 'message' => 'Roles added successfully'];
        }
    }

    public function createMenu($request) {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255|unique:menu_settings,name,' . $request->input('id')
                        ], [
                    'name.required' => 'Name is required.',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }

        $Menu = ($request->input('id') > 0 ) ? Menu::find($request->input('id')) : new Menu;
        $Menu->name = $request->input('name');
        $Menu->p_id = $request->input('p_id');
        $Menu->url = $request->input('url');
        $Menu->icon_name = $request->input('icon_name');
        $Menu->status = $request->input('status');
        $Menu->created_at = date("Y-m-d H:i:s");
        $Menu->updated_at = date("Y-m-d H:i:s");
        $Menu->save();
        if ($request->input('id') > 0) {
            return ['result' => true, 'message' => 'Menu updated successfully'];
        } else {
            return ['result' => true, 'message' => 'Menu added successfully'];
        }
    }

    function rolePerm($id) {
        if ($id != null) {
            $rolePerm = DB::table('role_menu')
                            ->select('role_menu.id as role_menu_id', 'menu_settings.name as module')
                            ->join('menu_settings', 'role_menu.menu_id', '=', 'menu_settings.id')
                            ->where('role_id', $id)->get();
        } else {

            $rolePerm = DB::table('role_menu')
                    ->select('role_menu.id as role_menu_id', 'menu_settings.name as module')
                    ->join('menu_settings', 'role_menu.menu_id', '=', 'menu_settings.id')
                    ->get();
        }

        return $rolePerm;
    }

    public function roles($id) {
        if ($id != null) {
            $roles = DB::table('roles')
                            ->select('roles.id as role_id', 'roles.name as roles')
                            ->where('id', $id)->get();
        } else {
            $roles = DB::table('roles')
                    ->select('roles.id as role_id', 'roles.name as roles')
                    ->get();
        }

        return $roles;
    }

    public function menu($id) {
        if ($id != null) {
            $menu = DB::table('menu_settings')
                            ->select('menu_settings.id as menu_id', 'menu_settings.name as menu')
                            ->where('id', $id)->get();
        } else {
            $menu = DB::table('menu_settings')
                    ->select('menu_settings.id as menu_id', 'menu_settings.name as menu')
                    ->get();
        }

        return $menu;
    }

    public function deleteMenu($id) {
        DB::table('menu_settings')->where('id', '=', $id)->orWhere('p_id', $id)->delete();
        return ['result' => true, 'message' => 'Menu Setting deleted successfully'];
    }

}
