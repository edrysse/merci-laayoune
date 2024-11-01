<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // if(Auth::user()->role == "1"){
        //     return redirect('admin');
        // }else{
        //     return redirect('clientIndex');
        // }

        if(Auth::check()){
            if(Auth::user()->role == "1"){
                return redirect('admin');
            }else{
                return redirect('clientIndex');
            }
        }else{
         return   redirect('clientIndex');
        }

    }
}
