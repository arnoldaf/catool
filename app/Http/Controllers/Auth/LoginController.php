<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\ActivityLog;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Input;
use App\UserDomainConfig;

class LoginController extends Controller
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function getLogin() {
        setClientConfData();
       
        return view('login');
    }
    
    public function postLogin(Request $request) {
       
        $requiredField = [
            "email" => "required|email|max:255",
            "password" => "required|min:5",
        ];
        $validate = Validator::make($request->all(), $requiredField);
        $responseMsg = "Email or password is wrong";
        if ($validate->fails()) {
            $responseMsg = implode("<br>", $validate->errors()->all());
            
            return response()->json(['result' => false, 'msg' => $responseMsg]);
        }       
        $email = $request->email;
        $password = $request->password;
        $clientId = Session::get('client_id');
        $loggedFlag = false;
        if ($clientId > 0) {
            if (Auth::attempt(['id' =>$clientId, 'email' => $email, 'password' => $password, 'status' => '1'])) {                
                $loggedFlag = true;
            }
            elseif (Auth::attempt(['p_id' =>$clientId, 'email' => $email, 'password' => $password, 'status' => '1'])) {   
                $loggedFlag = true;
            }
            elseif (Auth::attempt(['email' => $email, 'password' => $password, 'status' => '1', 'role_id' => 0])) {             
                $loggedFlag = true;
            }
        }
        else if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => '1', 'role_id' => 0])) {             
            $loggedFlag = true;
        }
        if ($loggedFlag) {
            $user = Auth::user();
            $user->last_login = date('Y-m-d h:i:s');
            $user->is_login = 1;
            $user->save();
            $eventLog = new ActivityLog();
            $eventLog->activity_name = 'Login to system';
            $eventLog->user_id = Auth::id();
            $eventLog->ip = request()->ip();
            $eventLog->info = json_encode($_SERVER);
            $eventLog->save();
            
            return response()->json(['result' => true, 'msg' => 'Success']);
        }
        
        return response()->json(['result' => false, 'msg' => $responseMsg]);
    }
    
    
     public function postLoginAuth(Request $request) {
        try {
            if (!$token = JWTAuth::attempt($request->only('email', 'password'))) {
                return $this->setStatusCode(200)->respond([
                            'message' => __('Invalid Credentials'),
                            'status_code' => 404
                ]);
            }
        } catch (JWTException $e) {
            return $this->setStatusCode(200)->respond([
                        'message' => __('could not create token'),
                        'status_code' => 500
            ]);
        }
        $user = JWTAuth::authenticate($token);
        //Check if user is active.
        if ($user->status == 0) {
            return $this->setStatusCode(200)->respond([
                        'message' => __('user not active'),
                        'status_code' => 403
            ]);
        }
        //to authenticate domain
        if ($user->role_id > 0) {
            $pId = $user->p_id;           
            $clientDomain = (!$request->header('host')) ? env(DEFAULT_DOMAIN, 'localhost:4200') : str_replace(['http://', 'https://'], '', $request->header('host'));
            $clientInfo = UserDomainConfig::whereIn('user_id', [$user->id, $pId])
                    ->where('domain_name', $clientDomain)
                    ->first();
            if (!$clientInfo) {
                return response()->json(['error' => ['user' => trans('User not found')]], 404);
            }
        }
        
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
       return $this->setStatusCode(200)->respond(['data'=> 111,'status' => 200, 'status_code' => 200]);
        
    }
    
    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            $user->is_login = 0;
            $user->save();
        }
        Auth::logout();
        
        return redirect(url('auth/login'));
    }
    
    
}
