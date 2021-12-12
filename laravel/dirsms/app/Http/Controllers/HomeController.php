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
        // if (!extension_loaded('imagick')){
        //     echo 'imagick not installed';
        // }
        // phpinfo();

        

    return view('welcome');
    }
  
}
