<?php

namespace App\Http\Controllers;

use App\Market;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Charts;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function farmer()
    {
        return view('dashboard.farmer');
    }
    public function admin()
    {
        $market = Market::where('product', 'Maize');
        $chart = Charts::create('bar', 'material')
            ->title("Maize Prices")
            ->dimensions(0, 400)
            ->elementLabel('Buying Price/Bag')
            ->labels($market->pluck('market'))
            ->values($market->pluck('b_price'))
            ->values($market->pluck('s_price'));

        $market = Market::where('product', 'eggs');
        $chart1 = Charts::create('bar', 'material')
            ->title("Eggs Prices/Create")
            ->dimensions(0, 400)
            ->elementLabel('Selling Price')
            ->labels($market->pluck('market'))
            ->values($market->pluck('b_price'));

        $market = Market::where('product', 'tomatoes');
        $chart2 = Charts::create('bar', 'material')
            ->title("Eggs Prices/Create")
            ->dimensions(0, 400)
            ->elementLabel('Selling Price')
            ->labels($market->pluck('market'))
            ->values($market->pluck('b_price'));


        return view('home')->with(['chart' => $chart, 'chart1' => $chart1, 'chart2' => $chart2]);
    }
    public function investor()
    {
        return view('dashboard.investor');
    }
    public function officer()
    {
        return view('dashboard.officer');
    }
}
