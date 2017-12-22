<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

////////////////////////////////////////////////
protected function authenticated(Request $request, $user)
{
if ( $user->hasRole('admin') ) {// do your margic here
    return redirect()->route('Adminiscontroller');
}

    if($request->ajax()){
        return response()->json(['status'=>'success','redirect'=>'profile','message'=>'Successfully Logged In!']);
    }else{
        return redirect('/home');
    }
}

///////////////////////////////////////////////    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*Custom Validation*/
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required',
            'password' => 'required',
            //'g-recaptcha-response' => 'required|recaptcha',
            // new rules here
        ]);
    }
    /*Custom Validation*/
}
