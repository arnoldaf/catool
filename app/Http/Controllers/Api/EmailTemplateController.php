
<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\EmailTemplateService;
use Illuminate\Support\Facades\View;
use App\EmailTemplate;

class EmailTemplateController extends ApiController {
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
        // load the view and pass the email templates
        return View::make('emailtemplates.index')
                        ->with('emailtemplates', $emailtemplates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        // load the create form (app/views/emailtemplates/create.blade.php)
        return View::make('emailtemplates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'subject' => 'required',
            'body' => 'required|email',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('emailtemplates/create')
                            ->withErrors($validator);
        } else {
            // store
            $nerd = new EmailTemplate;
            $nerd->subject = Input::get('subject');
            $nerd->body = Input::get('body');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully created email template!');
            return Redirect::to('emailtemplate');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        // get the emailtemplate
        $emailtemplate = EmailTemplate::find($id);
        // show the view and pass the emailtemplate to it
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
        return View::make('emailtemplate.edit')
                        ->with('emailtemplate', $emailtemplate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'subject' => 'required',
            'body' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('emailtemplates/' . $id . '/edit')
                            ->withErrors($validator);
        } else {
            // store
            $nerd = EmailTemplate::find($id);
            $nerd->name = Input::get('subject');
            $nerd->email = Input::get('body');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully updated email template!');
            return Redirect::to('emailtemplate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        // delete
        $nerd = EmailTemplate::find($id);
        $nerd->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the email template!');
        return Redirect::to('emailtemplates');
    }

}


?>