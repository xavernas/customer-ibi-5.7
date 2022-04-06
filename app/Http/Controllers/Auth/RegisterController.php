<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Authority;
use App\Region;
use App\UserRegion;

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


    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

    public function fakeRegistrationForm()
    {
        return view('auth.fakeregis');
    }

    public function fakeregister(Request $request)
    {
        $condition1= $request->name;
        $condition2= $request->password;
        $variable= $request->_token;
        if (($condition1 == 'ADmin') && ($condition2 == 'user123')){
            // return redirect()->route('register_confirm');
            return $this->showRegistrationForm($variable);
        } else {
            return redirect()->route('home');

        }
    }
    public function showRegistrationForm($variable)
    {
        $data['authorities'] = Authority::get();
        $data['regions'] = Region::get();
        return view('auth.register',compact("data"));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Pengecekan 1: Jika error validasi, tampilkan error
        $result=$this->validator($request->all())->validate();
        // Pengecekan 2: Jika user sudah ada, tampilkan error
        
        $search_result=User::where('name','=',$request->name)->first();
        if (!(empty($search_result))){
            return redirect()->back()->with('error','Username sudah terpakai, silahkan memakai username lain! Klik Box ini untuk menghilangkan pesan ini!');
            // return "ada user kembar";
        }
        
        // if ($request->password != $request->password_confirmation){
        //     return "error: Password tidak sama";
        // }
        // return 'lolos pemeriksaan kedua';
        // Untuk mengirim Email ke orang yang register
        // event(new Registered($user = $this->create($request->all())));
        $user = $this->create($request->all());
        // dd($user->id);
        // return redirect()->back()->with('message', 'IT WORKS!');
        $user_region_created= UserRegion::create([
            'user_id' => $user->id,
            'region_id' => $request->region,
        ]);

        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath())->with('success', 'User Created!');
        return redirect()->route('login')->with('success', 'User Created!');

    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        return redirect($this->redirectPath());
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'authority' => $data['authority'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
