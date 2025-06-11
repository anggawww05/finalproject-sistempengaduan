<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function viewForm1()
    {
        $category = Category::all();
        return view('user.formulirakademik', compact('category'));
    }

    public function viewPostSubmit()
    {
        return view('user.postsubmit');
    }

    public function viewNews()
    {
        return view('user.news');
    }
}
