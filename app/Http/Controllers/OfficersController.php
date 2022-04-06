<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class OfficersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.officer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'id_number' => 'required|max:8|min:7',
            'level' => 'required',
            'contact' => 'required|regex:/(254)[0-9]{9}/|max:12|min:12',
            'cover_image' => 'required|nullable|image|max:4000',
            'county' => 'required|string',
            'sub_county' => 'required|string',
            'ward' => 'required|string',
            'specialization' => 'required|string',
            'flexibility' => 'required|string|in:Available,Flexible,On Request',

           ]);
                if ($request->hasFile('cover_image'))
                {
                    $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
                    $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('cover_image')->getClientOriginalExtension();
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    $path = $request->file('cover_image')->storeAs('public/images', $fileNameToStore);

                }else
                {
                    $fileNameToStore = 'noimage.jpg';
                }

                $officer = new User();
                $officer -> name = $request->input('name');
                $officer -> email = $request->input('email');
                $officer -> password = Hash::make($request->input('password'));
                $officer -> id_number = $request->input('id_number');
                $officer -> level = $request->input('level');
                $officer -> phone = $request->input('contact');
                $officer -> cover_image = $fileNameToStore;
                $officer -> county = $request->input('county');
                $officer -> sub_county = $request->input('sub_county');
                $officer -> ward = $request->input('ward');
                $officer -> specialization = $request->input('specialization');
                $officer -> flexibility = $request->input('flexibility');
                $officer ->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.status')->with(['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userStatus(Request $request, $id)
    {
        $status = User::find($id);
        $status -> status = $request->input('status');
        $status->save();

        return redirect('/Users')->with('success', 'User subscription status updated successfully');
    }
}
