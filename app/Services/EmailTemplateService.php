<?php

namespace App\Services;

use Validator;
use App\EmailTemplate;
use DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class EmailTemplateService {

    public function createEmailTemplate($request) {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'email_subject' => 'required|unique:email_templates,subject,' . $request->input('id'),
                    'email_body' => 'required',
                    'email_to' => 'required',
                    'email_cc' => 'required',
                    'email_bcc' => 'required'
                        ], [
                    'email_subject.required' => 'Email subject is required.',
                    'email_body.required' => 'Email body is required.',
                    'email_to.required' => 'TO is required.',
                    'email_cc.required' => 'CC is required.',
                    'email_bcc.required' => 'BCC is required.',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[$key] = $value[0];
            }
            return ['errors' => $messges];
        }

        $EmailTemplte = ($request->input('id') > 0 ) ? EmailTemplate::find($request->input('id')) : new EmailTemplate;
        $EmailTemplte->body = $request->input('email_body');
        $EmailTemplte->subject = $request->input('email_subject');
        $EmailTemplte->to = $request->input('email_to');
        $EmailTemplte->cc = $request->input('email_cc');
        $EmailTemplte->bcc = $request->input('email_bcc');
        $EmailTemplte->save();

        //dd(DB::getQueryLog());  
        return ['data' > $EmailTemplte->toArray(), 'errors' => ''];
        
        /*
          $EmailTemplte->save();
          if ($request->input('id') > 0) {
          return ['result' => true, 'message' => 'Email Template updated successfully'];
          } else {
          return ['result' => true, 'message' => 'Email Template added successfully'];
          }
         * 
         */
    }

   /* public function deleteEmailTemplate($id) {
        DB::table('email_templates')->where('id', '=', $id)->delete();
        return ['result' => true, 'message' => 'Email Template deleted successfully'];
    }
    * 
    */
    
    public function deleteEmailTemplate($request) {
        $id = $request->input('id');
        // delete
        $template = EmailTemplate::find($id);
        $template->delete();
        return $template->toArray();
    }

    
   /* public function getEmailTemplate($id) {
        if ($id != null) {
            $emailTemplate = DB::table('email_templates')
                            ->where('id', $id)->get();
        } else {
            $emailTemplate = DB::table('email_templates')
                    ->orderBy('id', 'desc')
                    ->get();
        }
        return ['data' => $emailTemplate];
    }
    * 
    */
    
      public function getEmailTemplate($id) {
        if ($id != null) {
            $template = EmailTemplate::find($id);
        } else {
            $template = EmailTemplate::all();
        }
        return $template->toArray();
    }

    public function getEmailGroup($id) {
        if ($id != null) {
            $emailGroup = DB::table('email_group')
                            ->where('id', $id)->get();
        } else {
            $emailGroup = DB::table('email_group')
                    ->get();
        }
        return ['data' => $emailGroup];
    }
    /**
     * parse Token
     * @return type array
     */
    public function parseToken() {
        return $payload = JWTAuth::parseToken()->getPayload();
    }


}
