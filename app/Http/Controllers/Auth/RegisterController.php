<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    public function getData(){
        $data['data'] = DB::table('roles')->get();
        if(count($data)>0){

            return view('auth.register' ,$data);

        }
        else {
            return view('auth.register');
        }
    }
    function insert(Request $req){

        $this->getData();

        echo "succes";

    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('auth');
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
            'firstname' => 'required|max:255',
            'surname'=> 'required|max:255',
            'employeenumber' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
      $userRole = Role::where('name', '=', 'user')->first();

        $day = Input::get('day');
        $month = Input::get('month');
        $year = Input::get('year');

        $dob = $year . '-' . $month . '-' . $day;

        $user = new User();
        $user->firstname= $data['firstname'];
        $user->surname=$data['surname'];
        $user->dob=$dob;
        $user->employeenumber = $data['employeenumber'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->vessel = $data['vessel'];
        $user->save();
        $user->roles()->attach($userRole);

        return $user;


    }

}
