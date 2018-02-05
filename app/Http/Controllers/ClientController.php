<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;

class ClientController extends Controller {

    public function index() {
        return view('layouts.client');
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
