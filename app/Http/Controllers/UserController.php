<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Client;

class UserController extends Controller {
    /* public function index() {
      return view('layouts.client');
      }

     * 
     */

    public function index($id = null) {
        $users = [];
        if ($id != null) {
            //$users = (new ClientService)->getClients($id);
            $users = Client::find($id)->toArray();
        }
       

        return view('layouts.user')->with('user', $users);

        //return View::make('customers.edit')->with('customer', $customer);
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

    public function getUsers($id = null) {
        $data = (new UserService)->getClients($id);
        return response()->json($data);
    }

    public function deleteClient($id = null) {
        $data = (new UserService)->deleteClient($id);
        return response()->json($data);
    }

}
