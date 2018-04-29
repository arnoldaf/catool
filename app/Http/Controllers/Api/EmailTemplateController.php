<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\EmailTemplateService;

class EmailTemplateController extends ApiController {

    public function getEmailTemplate($id = null) {
        $data = (new EmailTemplateService)->getEmailTemplate($id);
        return response()->json($data);
    }
    
     public function getEmailGroup($id = null) {
        $data = (new EmailTemplateService)->getEmailGroup($id);
        return response()->json($data);
    }

    public function createEmailTemplate(Request $request) {
        $data = (new EmailTemplateService)->createEmailTemplate($request);
        return response()->json($data);
    }

    public function deleteEmailTemplate($id = null) {
        $data = (new EmailTemplateService)->deleteEmailTemplate($id);
        return response()->json($data);
    }

}
