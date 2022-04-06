<?php

namespace App\Http\Controllers;

use App\Sponsor;
use App\Website;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function site()
   {
       $website = Website::all();
       $sponsor = Sponsor::all();
       return view('welcome')->with(['website' => $website, 'sponsor' => $sponsor]);
   }
}
