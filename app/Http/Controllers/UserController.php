<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller {

    public function __construct() {
        // nothing
    }

    public function index() {
        return view('layouts.user');
    }
    
     public function indexlist() {
        return view('layouts.userlist');
    }

    public function getUser() {
        $data = (new Example)->getUsersData();

        return view('welcome', $data);
    }

    public function createUser(Request $request) {
        $data = (new UserService)->createUser($request);
        return response()->json($data);
    }

}
