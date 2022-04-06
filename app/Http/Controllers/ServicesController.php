<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use App\Auth;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officer = User::where(['level' => 'Officer','status' =>'1'])->orderBy('created_at', 'DESC')->get();
        $service = Service::all();
        return view('services.index')->with(['service' =>  $service, 'officer' => $officer]);
    }

    public function client()
    {
       $service = Service::all();
       return view('services.client')->with('service', $service);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'service'           => 'required|string',
            'description'       => 'required|string|min:10|max:200',
            'cover_image'       =>  'nullable|image|max:4000',
            'status'            =>  'required|string',
            'officer_id'        =>  'required',
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
            $service = new Service();
            $service -> service         = $request->input('service');
            $service -> description     = $request->input('description');
            $service -> cover_image     = $fileNameToStore;
            $service -> officer_id      = $request->input('officer_id');
            $service -> status          = $request->input('status');
            $service -> farmer_id       = auth()->id();
            $service ->save();

            return back()->with('success', 'Service booked successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = User::find($id);
        return view('services.book')->with('service', $service);
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
