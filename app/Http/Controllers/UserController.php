<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\View;
use App\Users;

class UserController extends Controller {

    public function index($id = null) {
        $users = [];
        if ($id != null) {
            $users = Users::find($id)->toArray();
            return view('layouts.userprofile')->with('user', $users);
        }
        else{
       // return view('layouts.user')->with('user', $users);
         return View::make('layouts.user')
                        ->with('users', $users);
        }
    }

    public function indexlist() {
        
        $users = [];
        $users = (new UserService)->getUsers($id=null);
         return View::make('layouts.users')
                        ->with('usersdata', $users);
    }

    public function createUsers(Request $request) {
        $data = (new UserService)->createUsers($request);
        return response()->json($data);
    }

    public function getUsers($id = null) {
        $data = (new UserService)->getUsers($id);
        return response()->json($data);
    }

    public function deleteUsers($id = null) {
        $data = (new UserService)->deleteUsers($id);
        return response()->json($data);
    }

}
