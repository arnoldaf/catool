<?php

namespace App\Services;
use Validator;
use Auth;
use App\DocumentMaster;

class DocumentMasterService
{
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 
	public function getDocumentMasters($id=null) {
		$smstemplates = [];
		if($id != null) {
			$sms = Sms::find($id);
			// get all the nerds
			$smstemplates = DocumentMaster::find($id);
		} else {
			// get all the nerds
            $smstemplates = DocumentMaster::all();
		}
		return $smstemplates;
    }
	
}


