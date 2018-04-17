<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ActivityLog;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }
    
    
    
     public function postLoginAuth(Request $request) {
        
          $inputs = $request->all();
          $request = $request->instance();
          $content = $request->getContent();
          $data = json_decode($content, TRUE);
          Input::merge(['email' => $data['email']]);
          Input::merge(['password' => $data['password']]);
       
        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        //$request->input('email') = $data['email'];
        //$request->password('password') = $data['password'];
        
        $request->merge([$field => $request->input('email')]);

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($request->only($field, 'password'))) {
                return $this->setStatusCode(200)->respond([
                            'message' => __('Invalid Credentials'),
                            'status_code' => 404
                ]);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->setStatusCode(200)->respond([
                        'message' => __('could not create token'),
                        'status_code' => 500
            ]);
        }
        
        //Get the user.
        $user = JWTAuth::authenticate($token);

         
        //Check if user is active.
        if ($user->status == 0) {
            return $this->setStatusCode(200)->respond([
                        'message' => __('user not active'),
                        'status_code' => 403
            ]);
        }
        
       // $token = encrypt($token);

       
        //Get User Role
        $user_role = 'CA';
        $username = $user->first_name;
        $email = $user->email;
        
        // all good so return the token
        return $this->setStatusCode(200)->respondWithToken(compact('token', 'user_role', 'username', 'email'));
        
    }
    
    
     /**
     * Set Status Code
     *
     * @param type $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }
    
    /**
     * Return Type For All Success Response
     *
     * @param type $data
     * @param type $headers
     * @return type
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * Return Type For Respond With Token
     *
     * @param type $token
     * @return type
     */
    public function respondWithToken($token)
    {
        return $this->respond(['data' => $token, 'status_code' => 201]);
    }

    /**
     * Return Type For Respond With Error
     *
     * @param type $message
     * @return type
     */
    public function respondWithError($message)
    {
        return $this->respond(['error' => [
                        'message' => $message,
                        'status_code' => $this->getStatusCode()
        ]]);
    }
    
     /**
     * Get Status Code
     *
     * @return type
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    
    
     /**
     * Return Type For Respond With Token
     *
     * @param type $token
     * @return type
     */
    public function verify(Request $request)
    {
       return $this->setStatusCode(200)->respond(['data'=> 111,'status' => 201, 'status_code' => 201]);
        
    }
    
    
}
