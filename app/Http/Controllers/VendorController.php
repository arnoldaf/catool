<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VendorService;
//use Illuminate\Support\Facades\View;
//use App\Vendors;

class VendorController extends Controller {

    public function vendors($id = null) {
        $data = (new VendorService)->getVendors($id);
        return response()->json($data);
    }


    public function createVendor(Request $request) {
        $data = (new VendorService)->createVendor($request);
        return response()->json($data);
    }

   
    public function deleteVendor($id = null) {
        $data = (new VendorService)->deleteVendor($id);
        return response()->json($data);
    }

}
