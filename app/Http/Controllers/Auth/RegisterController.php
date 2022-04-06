<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'id_number' => 'required|max:8|min:7',
            'level' => 'required',
            'contact' => 'required|regex:/(254)[0-9]{9}/|max:12|min:12',
            'farming' => 'required|string|in:Small Scale,Large Scale',
            'crop' => 'required|string',
            'cover_image' => 'required|image|max:4000',
            'county' => 'required|string',
            'sub_county' => 'required|string',
            'ward' => 'required|string',
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
      /*  */
        $request = request();
        $profileImage = $request->file('cover_image');
        $profileImageSaveAsName = time()."-profile".$profileImage->getClientOriginalExtension();
        $upLoad_path = 'public/images';
        $profile_image_url = $profileImageSaveAsName;
        $success = $profileImage->move($upLoad_path, $profileImageSaveAsName);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['contact'],
            'id_number' => $data['id_number'],
            'farming' => $data['farming'],
            'crop'  => $data['crop'],
            'ward'  => $data['ward'],
            'sub_county' => $data['sub_county'],
            'county' => $data['county'],
           'cover_image' => $profile_image_url,
            'level' => $data['level'],
        ]);
    }
}
