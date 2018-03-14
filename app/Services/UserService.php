<?php

namespace App\Services;

use Validator;
use App\Users;

class UserService {

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createUsers($request) {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'first_name' => 'required|max:255',
                    'last_name' => 'required|max:255',
                    'client_email' => 'required|email|max:255|unique:users,email,' . $request->input('id'),
                    'client_mobile' => 'required|max:10|unique:users,mobile,' . $request->input('id'),
                    'client_password' => 'min:6',
                    'confirm_password' => 'required_with:client_password|same:client_password|min:6'
                        ], [
                    'first_name.required' => 'Name is required.',
                    'last_name.required' => 'Name is required.',
                    'client_email.required' => 'We need to know your e-mail address!',
                    'client_mobile.required' => 'We need to know your mobile!',
                    'client_password.required' => 'Password is required!',
                    'confirm_password.required' => 'Confirm Password must be same as password!',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }


        $Users = ($request->input('id') > 0 ) ? Users::find($request->input('id')) : new Users;
        $Users->first_name = $request->input('first_name');
        $Users->last_name = $request->input('last_name');
        $Users->email = $request->input('client_email');
        $Users->password = bcrypt($request->input('client_password'));
        $Users->mobile = $request->input('client_mobile');
        $Users->user_type_id = $request->input('client_type');
        $Users->ip_address = $request->ip();
        $Users->p_id = 2;
        $Users->role_id = 1;
        $Users->status = 1;
        $Users->save();
        if ($request->input('id') > 0) {
            return ['result' => true, 'message' => 'User updated successfully'];
        } else {
            return ['result' => true, 'message' => 'User added successfully'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getUsers($id) {
        if ($id != null) {
            $users = Users::find($id);
        } else {
            // $users = Users::all();
            $users = Users:: where('role_id', '2')->get();
        }
        
        return $users;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteUsers($id) {
        // delete
        $users = Users::find($id);
        $users->delete();
        return ['result' => true, 'message' => 'User deleted successfully'];
    }

}
