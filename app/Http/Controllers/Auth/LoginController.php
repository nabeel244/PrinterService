<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use App\Models\User;
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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login()
    {

        return view('auth.loginRegister');
    }

    public function authenticate(LoginRequest $request)
    {

        try {
            $input_fileds = [];

            if (is_numeric($request->get('email_or_phone'))) {

                $input_fileds = ['mobile' => $request->get('email_or_phone'), 'password' => $request->get('password')];
            } elseif (filter_var($request->get('email_or_phone'), FILTER_VALIDATE_EMAIL)) {

                $input_fileds = ['email' => $request->get('email_or_phone'), 'password' => $request->get('password')];
            }
            $user = User::where('email', $request->email_or_phone)->Orwhere('mobile', $request->email_or_phone)->first();
            if ($user) {
                if ($user->status == 'blocked') {
                    return response()->json(['error' => true, "message" => 'Blocked By Admin']);
                }
            }

            if (Auth::attempt($input_fileds)) {
                return response()->json(['success' => true, "redirect_url" => url('/')]);
            }
            return response()->json(['error' => true, 'message' => 'Oppose! You have entered invalid credentials']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login-or-signup');
    }
}
