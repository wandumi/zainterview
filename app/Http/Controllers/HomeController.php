<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use App\Models\Artists;
use Illuminate\Http\Request;

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
        $artists = Artists::where('user_id', Auth()->user()->id)->get();
        $albums = Albums::where('user_id', Auth()->user()->id)->get();
        
        return view('home', compact('artists','albums'));
    }
}
