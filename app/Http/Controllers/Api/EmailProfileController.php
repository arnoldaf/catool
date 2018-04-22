<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\EmailProfileService;
use Illuminate\Support\Facades\View;
use App\EmailProfile;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;

class EmailProfileController extends ApiController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $emailprofiles = (new EmailProfileService)->getEmailProfiles();

        return View::make('emailprofiles.index')
                        ->with('emailprofiles', $emailprofiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('emailprofiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $rules = array(
            'name' => 'required',
            'host' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/email-profiles/create')->withErrors($validator);;
        }
        $nerd = new EmailProfile;
        $nerd->name = $request->name;
        $nerd->host = $request->host;
        $nerd->port = $request->port;
        $nerd->email = $request->email;
        $nerd->password = $request->password;
        $nerd->status = $request->status;
        $nerd->save();
        Session::flash('message', 'Successfully created email profile!');

        return Redirect::to('admin/email-profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $emailprofile = EmailProfile::find($id);

        return View::make('emailprofiles.show')
                        ->with('emailprofile', $emailprofile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get the nerd
        $emailprofile = EmailProfile::find($id);

        // show the edit form and pass the nerd
        return View::make('emailprofiles.edit')
                        ->with('emailprofile', $emailprofile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $rules = array(
            'name' => 'required',
            'host' => 'required',
            'port' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/email-profiles/' . $id . '/edit')
                            ->withErrors($validator);
        }
        $nerd = EmailProfile::find($id);
        $nerd->name = Input::get('name');
        $nerd->host = Input::get('host');
        $nerd->port = Input::get('port');
        $nerd->email = Input::get('email');
        $nerd->password = Input::get('password');
        $nerd->status = Input::get('status');
        $nerd->save();
        Session::flash('message', 'Successfully updated email profile!');
        
        return Redirect::to('admin/email-profiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $nerd = EmailProfile::find($id);
        $nerd->delete();
        Session::flash('message', 'Successfully deleted the email profile!');
        return Redirect::to('admin/email-profiles');
    }

}

?>