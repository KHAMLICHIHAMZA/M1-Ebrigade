<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function login(Request $request)
    {

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
                dd($this);

            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
            $user = User::where('P_EMAIL', $request->P_EMAIL)
                ->where('P_MDP', md5($request->P_MDP))
                ->first();
             if($user){   
                 Auth::login($user);
                 return $this->sendLoginResponse($request);
                 return redirect('/home');
         }

         $this->incrementLoginAttempts($request);

         return $this->sendFailedLoginResponse($request);
           
   }
    public function id()
    {
        return 'P_ID';
    }

    public function username()
    {
return 'P_EMAIL';
    }
    public function password(){
        return'P_MDP';
    }


}
