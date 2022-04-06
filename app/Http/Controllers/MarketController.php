<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $market = Market::orderBy('day', 'DESC')->get();
        return view('market.index')->with('market', $market);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('market.new');
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
           'market' => 'required|string',
           'day'    => 'required|date',
           'type'   => 'required|string|in:Farm Produce,Animal Produce',
           'product'=> 'required|string',
           'quantity'=>'required|numeric',
           'units'  => 'required|string|in:Kgs,Litres,Crates,Bags,Nets',
           'b_price'=> 'required|string',
           's_price'=> 'required|string',
           'cover_image' => 'required|image|max:4000',
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

        $market = new Market();
        $market -> market   = $request->input('market');
        $market -> day      = $request->input('day');
        $market -> type     = $request->input('type');
        $market -> product  = $request->input('product');
        $market -> quantity = $request->input('quantity');
        $market -> units    = $request->input('units');
        $market -> b_price  = $request->input('b_price');
        $market -> s_price  = $request->input('s_price');
        $market -> cover_image = $fileNameToStore;
        $market->save();

        return redirect('/market')->with('success', 'Market data added successfully');
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
        $market = Market::find($id);
        return view('market.edit')->with('market', $market);
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
            'market' => 'required|string',
            'day'    => 'required|date',
            'type'   => 'required|string|in:Farm Produce,Animal Produce',
            'product'=> 'required|string',
            'quantity'=>'required|numeric',
            'units'  => 'required|string|in:Kgs,Litres,Crates,Bags,Nets',
            'b_price'=> 'required|string',
            's_price'=> 'required|string',
            'cover_image' => 'image|max:4000',
        ]);

        if ($request->hasFile('cover_image'))
        {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/images', $fileNameToStore);

        }
        $market = Market::find($id);
        $market -> market   = $request->input('market');
        $market -> day      = $request->input('day');
        $market -> type     = $request->input('type');
        $market -> product  = $request->input('product');
        $market -> quantity = $request->input('quantity');
        $market -> units    = $request->input('units');
        $market -> b_price  = $request->input('b_price');
        $market -> s_price  = $request->input('s_price');
        if ($request->hasFile('cover_image'))
        {
            $market -> cover_image = $fileNameToStore;
        }
        $market->save();

        return redirect('/market')->with('success', 'Market data successfully updated');
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
