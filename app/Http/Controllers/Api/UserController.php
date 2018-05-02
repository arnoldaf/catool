<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\View;
use App\Users;

class UserController extends ApiController {

    public function index($id = null) {
        $users = [];
        if ($id != null) {
            $users = Users::find($id)->toArray();
            return view('layouts.userprofile')->with('user', $users);
        }
        else{
       // return view('layouts.user')->with('user', $users);
         return View::make('layouts.user')
                        ->with('users', $users);
        }
    }

    public function indexlist() {
        
        $users = [];
        $users = (new UserService)->getUsers($id=null);
         return View::make('layouts.users')
                        ->with('usersdata', $users);
    }

    public function createUsers(Request $request) {
        $data = (new UserService)->createUsers($request);
        return response()->json($data);
    }

    public function addUser(Request $request) {
        $data = (new UserService)->addUser($request);
        
        if ($data['errors'] != null ) {
            $this->setErrorMessage($data['errors']);
            return $this->respond();
        }
        $this->setResponseData($data);
        return $this->respond(); 
        //return response()->json($data);
    }
    
    public function getUsers($id = null) {
        $users = (new UserService)->getUsers($id);
        $this->setResponseData($users);
        return $this->respond();   
    }
    
    public function getCaUsers($id = null) {
        $users = (new UserService)->getCaUsers($id);
        $this->setResponseData($users);
        return $this->respond();   
    }
    

    public function deleteUsers(Request $request) {
        $data = (new UserService)->deleteUsers($request);
        /*
        if ($data['errors'] != null ) {
            $this->setErrorMessage($data['errors']);
            return $this->respond();
        }*/
        $this->setResponseData($data);
        return $this->respond();  
    }
    
     public function deleteCaUsers(Request $request) {
        $data = (new UserService)->deleteUsers($request);
        $this->setResponseData($data);
        return $this->respond();  
    }
    
	
    public function updatePassword(Request $request) {
        $data = (new UserService)->updatePassword($request);
        return response()->json($data);
    }
    
    public function forgotPassword(Request $request) {
        $data = (new UserService)->forgotPassword($request);
        return response()->json($data);
    }
    
     public function addCaUser(Request $request) {
        $data = (new UserService)->addCaUser($request);
        
        if ($data['errors'] != null ) {
            $this->setErrorMessage($data['errors']);
            return $this->respond();
        }
        $this->setResponseData($data);
        return $this->respond(); 
        //return response()->json($data);
    }
    
    
    /**
    * Return Type For Respond With Token
    *
    * @param type $token
    * @return type
    */
   public function verify(Request $request)
   {
      $data = ['data'=> 111];
      return response()->json($data);
   }

}