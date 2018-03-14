<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EnquiryService;
use Illuminate\Support\Facades\View;
use App\Enquiry;

class EnquiryController extends Controller {

    public function createEnquiry(Request $request) {
        $data = (new EnquiryService)->createEnquiry($request);
        return response()->json($data);
    }

}
