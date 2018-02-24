<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmailTemplateService;
use Illuminate\Support\Facades\View;
use App\EmailTemplate;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;

class EmailTemplateController extends Controller {
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
    public function index() {
        $emailtemplates = (new EmailTemplateService)->getEmailTemplates();

        return View::make('emailtemplates.index')
                        ->with('emailtemplates', $emailtemplates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('emailtemplates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $rules = array(
            'subject' => 'required',
            'body' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            //Session::flash('message', implode("<br>", $validator->errors()->all()));
            //Session::flash('alert-class', 'alert-danger');
            return Redirect::to('admin/email-templates/create')->withErrors($validator);;
        }
        $nerd = new EmailTemplate;
        $nerd->subject = $request->subject;
        $nerd->body = $request->body;
        $nerd->save();
        Session::flash('message', 'Successfully created email template!');

        return Redirect::to('admin/email-templates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $emailtemplate = EmailTemplate::find($id);

        return View::make('emailtemplates.show')
                        ->with('emailtemplate', $emailtemplate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get the nerd
        $emailtemplate = EmailTemplate::find($id);

        // show the edit form and pass the nerd
        return View::make('emailtemplates.edit')
                        ->with('emailtemplate', $emailtemplate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $rules = array(
            'subject' => 'required',
            'body' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/email-templates/' . $id . '/edit')
                            ->withErrors($validator);
        }
        $nerd = EmailTemplate::find($id);
        $nerd->subject = Input::get('subject');
        $nerd->body = Input::get('body');
        $nerd->save();
        Session::flash('message', 'Successfully updated email template!');
        
        return Redirect::to('admin/email-templates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $nerd = EmailTemplate::find($id);
        $nerd->delete();
        Session::flash('message', 'Successfully deleted the email template!');
        return Redirect::to('admin/email-templates');
    }

}

?>