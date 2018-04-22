<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RolesService;
use Illuminate\Support\Facades\View;
use App\Roles;
use App\RolesPerm;

class RolesController extends ApiController {

    public function roles($id = null) {
        $data = (new RolesService)->roles($id);
        return response()->json($data);
    }

    public function rolePerm($id = null) {
        $data = (new RolesService)->rolePerm($id);
        return response()->json($data);
    }

    public function createRole(Request $request) {
        $data = (new RolesService)->createRole($request);
        return response()->json($data);
    }

    public function menu($id = null) {
        $data = (new RolesService)->menu($id);
        return response()->json($data);
    }
    
    public function createMenu(Request $request) {
        $data = (new RolesService)->createMenu($request);
        return response()->json($data);
    }

    public function deleteMenu($id = null) {
        $data = (new RolesService)->deleteMenu($id);
        return response()->json($data);
    }

    public function createRolePerm(Request $request) {
        $data = (new RolesService)->createRolePerm($request);
        return response()->json($data);
    }

    public function deleteRolePerm($id = null) {
        $data = (new RolesService)->deleteRolePerm($id);
        return response()->json($data);
    }

}
