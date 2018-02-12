<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\SmsTemplateService;
use Illuminate\Support\Facades\View;
use App\SmsTemplate;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;


class SmsTemplateController extends Controller {

	/*
	public function create()
		{
			return view('emailtemplates.create');
		}
	*/
		
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
		$emailtemplates = (new SmsTemplateService)->getSmsTemplates();
		// load the view and pass the email templates
        return View::make('smstemplates.index')
            ->with('smstemplates', $emailtemplates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/emailtemplates/create.blade.php)
        return View::make('smstemplates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
		
        // validate
		$rules = array(
			'subject'       => 'required',
			'sms_body'      => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('smstemplates/create')
				->withErrors($validator);
		} else {
			// store
			
			$sms = new SmsTemplate;
			$sms->subject       = Input::get('subject');
			$sms->sms_body      	= Input::get('sms_body');
			$sms->save();

			// redirect
			Session::flash('message', 'Successfully created sms template!');
			return Redirect::to('smstemplates');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the emailtemplate
		$smstemplate = SmsTemplate::find($id);
		// show the view and pass the emailtemplate to it
		return View::make('smstemplates.show')
			->with('smstemplate', $smstemplate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the nerd
		$smstemplate = SmsTemplate::find($id);
		// show the edit form and pass the nerd
		return View::make('smstemplates.edit')
			->with('smstemplate', $smstemplate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
		
       // validate
		$rules = array(
			'subject'       => 'required',
			'sms_body'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the form
		if ($validator->fails()) {
			return Redirect::to('emailtemplates/' . $id . '/edit')
				->withErrors($validator);
		} else {
			// store
			$sms = SmsTemplate::find($id);
			$sms->subject       = Input::get('subject');
			$sms->sms_body      = Input::get('sms_body');
			
			
			$sms->save();
			// redirect
			Session::flash('message', 'Successfully updated sms template!');
			return Redirect::to('smstemplates');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
		$sms = SmsTemplate::find($id);
		$sms->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the sms template!');
		return Redirect::to('smstemplates');
    }

}
?>