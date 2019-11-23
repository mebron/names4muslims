<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NameRating;
use App\Name;
//use Seo;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            //->first();
           // dd($hits);
           // $hits = $hits->names;
        $names = NameRating::where('total_value', '>', '500')->orderBy('total_value', 'desc')->take(24)->get();
        $collection = Name::where('gender','Boy')->get();
        $boys = $collection->random(24);
        $collection2 = Name::where('gender','Girl')->get();
        $girls = $collection2->random(24);
        return view('welcome', compact('names','boys','girls'));
    }

}
