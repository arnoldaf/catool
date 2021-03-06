<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\EmailTemplateService;

class EmailTemplateController extends ApiController {

    public function getEmailTemplate($id = null) {
        $data = (new EmailTemplateService)->getEmailTemplate($id);
        $this->setResponseData($data);
        return $this->respond();
        
    }

    public function getEmailGroup($id = null) {
        $data = (new EmailTemplateService)->getEmailGroup($id);
        return response()->json($data);
    }

    public function createEmailTemplate(Request $request) {

        $data = (new EmailTemplateService)->createEmailTemplate($request);
        if ($data['errors'] != null) {
            $this->setErrorMessage($data['errors']);
            return $this->respond();
        }
        $this->setResponseData($data);
        return $this->respond();
    }

   /* public function deleteEmailTemplate($id = null) {
        $data = (new EmailTemplateService)->deleteEmailTemplate($id);
        return response()->json($data);
    }
    * 
    */
    
    public function deleteEmailTemplate(Request $request) {
        $data = (new EmailTemplateService)->deleteEmailTemplate($request);
        $this->setResponseData($data);
        return $this->respond();
    }

}
