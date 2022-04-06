<?php

namespace App\Http\Controllers;

use App\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Calendar::orderBy('from','DESC')->get();
        return view('calender.index')->with('event', $event);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calender.event');
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
            'region' => 'string|required|in:Coast,Central,Eastern,Nairobi,North Eastern,Nyanza,Rift Valley,Western',
            'season' => 'string|required|in:Rainy,Hot Dry,Cold Dry',
            'from'   => 'date|required',
            'to'     => 'date|required',
            'rain'   => 'string|required|in:Below 500mm,501mm - 1000mm,1001mm - 1500mm,1501mm - 2500mm,Above 2501mm',
            'activities' => 'string|required',
            'harvest' => 'string|required|in:Low - Medium,Medium - High,Low - High,No Harvest',
        ]);

        $event = new Calendar();
        $event -> region = $request->input('region');
        $event -> season = $request->input('season');
        $event -> from   = $request->input('from');
        $event -> to     = $request->input('to');
        $event -> rain   = $request->input('rain');
        $event -> activities = $request->input('activities');
        $event -> harvest = $request->input('harvest');
        $event -> save();

        return redirect('/calendar')->with('success', 'Season event created successfully');
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
        $event = Calendar::find($id);
        return view('calender.edit')->with('event', $event);
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
            'region' => 'string|required|in:Coast,Central,Eastern,Nairobi,North Eastern,Nyanza,Rift Valley,Western',
            'season' => 'string|required|in:Rainy,Hot Dry,Cold Dry',
            'from'   => 'date|required',
            'to'     => 'date|required',
            'rain'   => 'string|required|in:Below 500mm,501mm - 1000mm,1001mm - 1500mm,1501mm - 2500mm,Above 2501mm',
            'activities' => 'string|required',
            'harvest' => 'string|required|in:Low - Medium,Medium - High,Low - High,No Harvest',
        ]);

        $event = Calendar::find($id);
        $event -> region = $request->input('region');
        $event -> season = $request->input('season');
        $event -> from   = $request->input('from');
        $event -> to     = $request->input('to');
        $event -> rain   = $request->input('rain');
        $event -> activities = $request->input('activities');
        $event -> harvest = $request->input('harvest');
        $event -> save();

        return redirect('/calendar')->with('success', 'Season event was successfully updated');
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
