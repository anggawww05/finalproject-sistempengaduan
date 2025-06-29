<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class OperatorAkademikController extends Controller
{
    public function indexDashboard()
    {
        return view('operatorakademik.dashboard');
    }

    public function indexPermintaan()
    {
        $reports = Report::where('status', 'pending')->where('category_id', 2)->get();
        return view('operatorakademik.permintaan', compact('reports'));
    }

    public function indexListPengaduan()
    {
        return view('operatorakademik.listpengaduan');
    }

    public function indexDetailPengaduan()
    {
        return view('operatorakademik.detailpengaduan');
    }
}
