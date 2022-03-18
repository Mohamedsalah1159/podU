<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\podcast;

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

    public function index(){
        $podcasts= Podcast::select('id', 'title', 'desc', 'photo', 'mp3')->paginate(10);
        return view('home', compact('podcasts'));
    }

}
