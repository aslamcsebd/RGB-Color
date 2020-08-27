<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home');
    }

    public function RGB(Request $request){

        
        $red = $request->red;
        $green = $request->green;
        $blue = $request->blue;
        $total = $red * $green * $blue;
        return view('home', compact('total', 'red', 'green', 'blue'));
    }
    
    public function fixed_RGB(Request $request){

        $fixed_RGB = true;
        $red = $request->red;
        $green = $request->green;
        $blue = $request->blue;
        return view('home', compact('fixed_RGB', 'red', 'green', 'blue'));
    }


}
