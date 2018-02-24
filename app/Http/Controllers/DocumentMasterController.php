<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\DocumentMasterService;
use Illuminate\Support\Facades\View;
use App\DocumentMaster;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;


class DocumentMasterController extends Controller {

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
        $documentmasters = (new DocumentMasterService)->getDocumentMasters();
        // load the view and pass the Document Master templates
        return View::make('documentmaster.index')
            ->with('documentmasters', $documentmasters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/emailtemplates/create.blade.php)
        return View::make('documentmaster.create');
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
			'title'       => 'required',
			'slug'      => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('documentmaster/create')
				->withErrors($validator);
		} else {
			// store
			
			$sms = new DocumentMaster;
			$sms->title       = Input::get('title');
			$sms->slug        = Input::get('slug');
                        $sms->description = Input::get('description');
			$sms->save();

			// redirect
			Session::flash('message', 'Successfully created document!');
			return Redirect::to('documentmaster');
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
		$smstemplate = DocumentMaster::find($id);
		// show the view and pass the emailtemplate to it
		return View::make('documentmaster.show')
			->with('documentmaster', $smstemplate);
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
		$smstemplate = DocumentMaster::find($id);
		// show the edit form and pass the nerd
		return View::make('documentmaster.edit')
			->with('documentmaster', $smstemplate);
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
			'title'       => 'required',
			'slug'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the form
		if ($validator->fails()) {
			return Redirect::to('documentmaster/' . $id . '/edit')
				->withErrors($validator);
		} else {
			// store
			$sms = DocumentMaster::find($id);
			$sms->title       = Input::get('title');
			$sms->slug      = Input::get('slug');
                        $sms->description      = Input::get('description');
			
			
			$sms->save();
			// redirect
			Session::flash('message', 'Successfully updated document!');
			return Redirect::to('documentmaster');
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
		$sms = DocumentMaster::find($id);
		$sms->delete();
		// redirect
		Session::flash('message', 'Successfully deleted the document');
		return Redirect::to('documentmaster');
    }

}
?>