<?php

namespace App\Http\Controllers;

use Illuminate\Auth\SessionGuard;
use Illuminate\Http\Request;
use function session;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(session()->all());
        //return view('home');
    }
}
