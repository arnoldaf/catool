<?php

namespace App\Services;

use App\EmailProfile;

class EmailProfileService {

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEmailProfiles($id = null) {
        $emailprofiles = [];
        if ($id != null) {
            $users = Client::find($id);
            // get all the nerds
            $emailprofiles = EmailProfile::find($id);
        } else {
            // get all the nerds
            $emailprofiles = EmailProfile::all();
        }
        return $emailprofiles;
    }

}
