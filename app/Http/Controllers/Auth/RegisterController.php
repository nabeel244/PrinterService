<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use App\Events\Notify;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(CreateUserRequest $request)
    {
        DB::beginTransaction();
        $user_type = $request['user_type'];
        $whatsapp = $request['phonecode_whatsapp'] . $request['whatsapp_number'];

        try {
            $user = User::create([
                'name' => $request['name'],
                'surname' => $request['surname'],
                'whatsapp_number' => $whatsapp,
                'mobile' => $request['mobile'],
                'mobile_code' => $request['phonecode_mobile'],
                'address' => $request['address'],
                'user_type' => $user_type,
                'email' => $request['email'],
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'password' => Hash::make($request['password']),

            ]);

            $user_type == 'user' ? $user->assignRole('user') : $user->assignRole('shopOwner');

            Notify::dispatch($user);
            DB::commit();
            return response()->json(['success' => 'Created Successfully!']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
    }
}
