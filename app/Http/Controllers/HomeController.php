<?php

namespace App\Http\Controllers;

use App\Models\User;
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
     * @return \Illuminate\View\View
     */

    // public function index()
    // {
    //     return view('auth.login');
    // }
    public function admin()
    {
        // $users = User::all();    
        return view('admin.dashboard');
    }
    public function sekum()
    {
        return view('sekum.dashboard');
    }
    public function sc_kestari()
    {
        return view('sc_kestari.dashboard');
    }
    public function oc()
    {
        return view('oc.dashboard');
    }
}
