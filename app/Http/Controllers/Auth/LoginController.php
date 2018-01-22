<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        if (Auth::attempt(['email' => $email, 'password' => $password])) {            
            return response()->json(['result' => true, 'msg' => 'Success']);
        }
        
        return response()->json(['result' => false, 'msg' => $responseMsg]);
    }
    
    public function logout()
    {
        Auth::logout();
        
        return redirect(url('auth/login'));
    }
}
