<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

//    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @param Request $request
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */

    public function getUserData()
    {
        $user = User::with('role')->paginate(10);
        return response()->json($user);
    }

    public function validation(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'username' => ['required', 'string', 'min:8', 'max:20', 'unique:user']
        ]);
    }

    public function tambahUser(Request $request)
    {
        $this->validation($request->all())->validate();
        event(new Registered($user = $this->store($request->all())));
        return response()->json([
            'status' => 'success',
            'code' => 200,
        ]);
    }

    protected function store(array $data)
    {
        $role = Role::where('nama_role', '=', $data['role'])->first();
        return User::create([
            'nama_lengkap' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'active_on' => Carbon::now(),
            'role_id' => $role->id_role
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Berhasil mendaftar pengunjung!',
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:8'],
            'username' => ['required', 'string', 'min:8', 'max:20', 'unique:user']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $role = Role::where('nama_role', '=', 'pengunjung')->first();
        return User::create([
            'nama_lengkap' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'active_on' => Carbon::now(),
            'role_id' => $role->id_role
        ]);
    }

    protected function registered(Request $request, $user)
    {
        //
    }
}
