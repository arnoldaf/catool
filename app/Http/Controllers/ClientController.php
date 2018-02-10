<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Client;

class ClientController extends Controller {
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
	
        return view('layouts.client')->with('user', $users);

        //return View::make('customers.edit')->with('customer', $customer);
    }

    public function indexlist() {
        return view('layouts.clientlist');
    }

    public function getUser() {
        $data = (new Example)->getUsersData();
        return view('welcome', $data);
    }

    public function createClient(Request $request) {
        $data = (new ClientService)->createClient($request);
        
        return response()->json($data);
    }
   

    public function getClients($id = null) {
     
        $data = (new ClientService)->getClients($id);
        return response()->json($data);
    }

    public function deleteClient($id = null) {
        $data = (new ClientService)->deleteClient($id);
        return response()->json($data);
    }

}