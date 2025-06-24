<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function indexTimeline()
    {
        return view('user.timeline');
    }

    public function indexDetailTimeline()
    {
        return view('user.detailtimeline');
    }
}
