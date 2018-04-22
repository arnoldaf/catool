<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Client;

class ClientController extends ApiController {

    public function index($id = null) {
        $users = [];
        if ($id != null) {
            $users = Client::find($id)->toArray();
        }
        return view('layouts.client')->with('user', $users);
    }

    public function indexlist() {
        return view('layouts.clients');
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
