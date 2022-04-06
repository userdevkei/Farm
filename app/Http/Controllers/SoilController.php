<?php

namespace App\Http\Controllers;

use App\Soil;
use Illuminate\Http\Request;

class SoilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soil = Soil::all();
        return view('soil.index')->with('soil', $soil);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soil.new');
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
            'soil'          => 'required|string',
            'color'         => 'required|string',
            'ph'            => 'required|string|in:1 - 3.5,3.6 - 6.9,7,8.0 - 11.5,11.6 - 14.0',
            'drainage'      =>  'required|string|in:Good,Medium,Poor',
            'aeration'      =>  'required|string|in:Good,Medium,Poor',
            'crops'         =>  'required|string',
            'cover_image'   =>  'required|image|max:4000'
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
        $soil = new Soil();
        $soil -> name       = $request->input('soil');
        $soil -> color      = $request->input('color');
        $soil -> ph         = $request->input('ph');
        $soil -> drainage   = $request->input('drainage');
        $soil -> aeration   = $request->input('aeration');
        $soil -> s_crops       = $request->input('crops');
        $soil -> cover_image= $fileNameToStore;
        $soil->save();

        return redirect('/soil')->with('success', 'Soil tested added successfully');

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
        $soil = Soil::find($id);
        return view('soil.edit')->with('soil', $soil);
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
        $this->validate($request,[
            'soil'          => 'required|string',
            'color'         => 'required|string',
            'ph'            => 'required|string|in:1 - 3.5,3.6 - 6.9,7,8.0 - 11.5,11.6 - 14.0',
            'drainage'      =>  'required|string|in:Good,Medium,Poor',
            'aeration'      =>  'required|string|in:Good,Medium,Poor',
            'crops'         =>  'required|string',
            'cover_image'   =>  'image|max:4000'
        ]);

        if ($request->hasFile('cover_image')) {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('cover_image')->storeAs('public/images', $fileNameToStore);
        }

        $soil =  Soil::find($id);
        $soil -> name       = $request->input('soil');
        $soil -> color      = $request->input('color');
        $soil -> ph         = $request->input('ph');
        $soil -> drainage   = $request->input('drainage');
        $soil -> aeration   = $request->input('aeration');
        $soil -> s_crops       = $request->input('crops');
        if ($request->hasFile('cover_image'))
        {
            $soil -> cover_image= $fileNameToStore;
        }
        $soil->save();

        return redirect('/soil')->with('success', 'Soil tested updated successfully');
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
