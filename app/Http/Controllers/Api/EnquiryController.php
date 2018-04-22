<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\EnquiryService;
use Illuminate\Support\Facades\View;
use App\Enquiry;

class EnquiryController extends ApiController {

    public function createEnquiry(Request $request) {
        $data = (new EnquiryService)->createEnquiry($request);
        return response()->json($data);
    }

}
