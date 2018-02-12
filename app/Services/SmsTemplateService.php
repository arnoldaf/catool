<?php

namespace App\Services;
use Validator;
use Auth;
use App\SmsTemplate;

class SmsTemplateService
{
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 
	public function getSmsTemplates($id=null) {
		$smstemplates = [];
		if($id != null) {
			$sms = Sms::find($id);
			// get all the nerds
			$smstemplates = SmsTemplate::find($id);
		} else {
			// get all the nerds
            $smstemplates = SmsTemplate::all();
		}
		return $smstemplates;
    }
	
}


