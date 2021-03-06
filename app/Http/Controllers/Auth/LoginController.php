<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function redirectPath()
    {
        return route(home_route());
    }

    public function username()
    {
        return config('access.users.username');
    }

    public function showLoginForm()
    {
        if(request()->ajax()){

        }
        return redirect('/')->with('show_login', true);
    }

    public function login(Request $request){


        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            $credentials = $request->only($this->username(), 'password');
            $authSuccess = Auth::attempt($credentials, $request->has('remember'));
            if($authSuccess){
                $request->session()->regenerate();
                if(auth()->user()->active > 0){
                    if(auth()->user()->isAdmin()){
                        $redirect = 'dashboard';
                    }else{
                        $redirect = 'back';
                    }
                    return response(['success' => true,'redirect' => $redirect], Response::HTTP_OK);
                }else{
                    Auth::logout();

                    return
                        response([
                            'success' => false,
                            'message' => 'Login failed. Account is not active'
                        ], Response::HTTP_FORBIDDEN);
                }
            }else{
                return
                    response([
                        'success' => false,
                        'message' => 'Login failed. Account not found blah blah'
                    ], Response::HTTP_FORBIDDEN);
            }

        }
        return response(['success'=>false,'errors' => $validator->errors()]);
    }
    

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        return redirect()->route('frontend.index');
    }
}
