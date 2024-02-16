<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Sc;
use App\Models\Oc;
use App\Models\Stakeholder;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function index()
    {
        return view('admin.dashboard');
    }

    public function user_management()
    {
        $scs = Sc::all();
        $ocs = Oc::all();
        return view("admin.user-management", compact('scs', 'ocs'));
    }

    public function stakeholder()
    {
        $stakeholders  = Stakeholder::all();
        return view('admin.stakeholder', compact('stakeholders'));
    }
    public function letter()
    {
        $letters  = Letter::all();
        return view('admin.letter', compact('letters'));
    }
    public function detail_letter()
    {
        $letters  = Letter::all();
        return view('admin.detail-letter', compact('letters'));
    }
}
