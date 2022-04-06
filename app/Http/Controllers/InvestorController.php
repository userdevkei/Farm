<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('auth.investor');
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
            'level' => 'required|string',
            'contact' => 'required|regex:/(254)[0-9]{9}/|max:12|min:12',
            'investor' => 'required|string|in:Individual,Company,Government',
            'investment' => 'required|string|in:Farm Inputs,Money,Both',
            'interest' => 'required|string',
            ]);

            $investor = new User();
            $investor -> name = $request->input('name');
            $investor -> email = $request->input('email');
            $investor -> password = Hash::make($request->input('password'));
            $investor -> level = $request->input('level');
            $investor -> phone = $request->input('contact');
            $investor -> investor = $request->input('investor');
            $investor -> investment = $request->input('investment');
            $investor -> support_crop = $request->input('interest');
            $investor ->save();

            return view('auth.login')->with('success', 'Account created successfully. Now log in.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
