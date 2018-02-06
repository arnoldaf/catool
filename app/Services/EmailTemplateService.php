<?php

namespace App\Services;
use Validator;
use Auth;
use App\EmailTemplate;

class EmailTemplateService
{
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 
	public function getEmailTemplates($id=null) {
		$emailtemplates = [];
		if($id != null) {
			$users = Client::find($id);
			// get all the nerds
			$emailtemplates = EmailTemplate::find($id);
		} else {
			// get all the nerds
            $emailtemplates = EmailTemplate::all();
		}
		return $emailtemplates;
    }
	
}


