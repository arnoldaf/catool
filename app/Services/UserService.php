<?php

namespace App\Services;

use Validator;
use App\Users;
use DB;

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
           $users = Users:: where('p_id','2')->orderBy('id','desc')->get();
       }
     
       return ['data' => $users];
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
       return ['result' => true, 'msg' => 'User deleted successfully','status_code' =>200];
   }

	
	public function forgotPassword($request) {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:255,email'
                        ], [
                    'email.required' => 'Email is required!',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }
        $email = $request->email;
        $count = Users::where('email', '=', $email)->count();

        if ($count > 0) {
            $roles = Users::where('email', '=', $email)->first();
            $user = $roles->first_name;
            $key = bcrypt(time() . rand(5, 15));

            DB::table('users')->where('email', $email)->update(['forgot_token' => $key]);

            $url = "http://ca1.mycatool.com/#/login?recoveryToken=" . $key;

            $activity = new \App\Services\ActivityService;
            $activity->setActivity('reset_password', ['user_name' => $user . $url], ['mailto' => $email]);
            return ['result' => true, 'message' => 'Email Available'];
        } else {
            return ['result' => true, 'message' => 'Email Not Available'];
        }
    }
	
	 public function updatePassword($request) {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'password' => 'required|min:6',
                    'confirm_password' => 'required_with:password|same:password|min:6',
                        ], [
                    'password.required' => 'Password is required!',
                    'confirm_password.required' => 'Confirm Password must be same as password!',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }
        $token = $request->input('forgot_token');
        $count = Users::where('forgot_token', '=', $token)->count();
       
        if ($count > 0) {
            DB::table('users')->where('forgot_token', $token)->update(['password' => 'ghh'] );
            DB::table('users')->where('forgot_token', $token)->update(['forgot_token' => ''] );
            return ['result' => true, 'message' => 'Password updated successfully'];
        }
    }
    
    
    
     /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function addUser($request) {
      
               $messges = [];
               $validator = Validator::make($request->all(), [
                           'firstname' => 'required|max:255',
                           'lastname' => 'required|max:255',
                           'email' => 'required|email|max:255|unique:users,email,' . $request->input('id'),
                           'phonenumber' => 'required|max:10|unique:users,mobile,' . $request->input('id'),
                           'password' => 'min:6',
                           'passwor_confirmation' => 'required_with:password|same:password|min:6'
                               ], [
                           'firstname.required' => 'Name is required.',
                           'lastname.required' => 'Name is required.',
                           'email.required' => 'We need to know your e-mail address!',
                           'phonenumber.required' => 'We need to know your mobile!',
                           'password.required' => 'Password is required!',
                           'passwor_confirmation.required' => 'Confirm Password must be same as password!',
                               ]
               );
      
               if ($validator->fails()) {
                   foreach ($validator->errors()->getMessages() as $key => $value) {
                       $messges[] = $value[0];
                   }
                   return ['result' => false, 'msg' => implode("<br>", $messges),'status_code' =>204];
               }
      
               $Users = ($request->input('id') > 0 ) ? Users::find($request->input('id')) : new Users;
               $Users->first_name = $request->input('firstname');
               $Users->last_name = $request->input('lastname');
               $Users->email = $request->input('email');
               $Users->password = bcrypt($request->input('password'));
               $Users->mobile = $request->input('phonenumber');
               $Users->user_type_id = $request->input('client_type');
               $Users->ip_address = $request->ip();
               $Users->p_id = 2;
               $Users->status = 1;
               $Users->save();
               if ($request->input('id') > 0) {
                   return ['result' => true, 'msg' => 'User updated successfully','status_code' =>200];
               } else {
                   return ['result' => true, 'msg' => 'User added successfully','status_code' =>204];
               }
       }

       

}
