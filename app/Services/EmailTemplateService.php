<?php

namespace App\Services;

use Validator;
use App\EmailTemplate;
use DB; 

class EmailTemplateService {

    public function createEmailTemplate($request) {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'email_subject' => 'required|unique:email_templates,subject,' . $request->input('id'),
                    'email_body' => 'required',
                    'to' => 'required',
                    'cc' => 'required',
                    'bcc' => 'required'
                        ], [
                    'email_subject.required' => 'Email subject is required.',
                    'email_body.required' => 'Template body is required.',
                    'to.required' => 'To is required.',
                    'cc.required' => 'CC is required.',
                    'bcc.required' => 'BCC is required.',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }

        $EmailTemplte = ($request->input('id') > 0 ) ? EmailTemplate::find($request->input('id')) : new EmailTemplate;
        $EmailTemplte->body = $request->input('email_body');
        $EmailTemplte->subject = $request->input('email_subject');
        $EmailTemplte->to = $request->input('to');
        $EmailTemplte->cc = $request->input('cc');
        $EmailTemplte->bcc = $request->input('bcc');
        $EmailTemplte->save();
        if ($request->input('id') > 0) {
            return ['result' => true, 'message' => 'Email Template updated successfully'];
        } else {
            return ['result' => true, 'message' => 'Email Template added successfully'];
        }
    }

    public function deleteEmailTemplate($id) {
        DB::table('email_templates')->where('id', '=', $id)->delete();
        return ['result' => true, 'message' => 'Email Template deleted successfully'];
    }

    public function getEmailTemplate($id) {
        if ($id != null) {
            $emailTemplate = DB::table('email_templates')
                            ->where('id', $id)->get();
        } else {
            $emailTemplate = DB::table('email_templates')
                    ->get();
        }
        return ['data' => $emailTemplate];
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

}
