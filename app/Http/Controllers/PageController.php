<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function viewLanding()
    {
        return view('user.landing');
    }

    public function viewPengaduan()
    {
        return view('user.pengaduan');
    }

    public function viewDetailPengaduan()
    {
        return view('user.detailpengaduan');
    }
}
