<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexDashboard()
    {
        return view('admin.dashboard');
    }

    public function indexPengguna()
    {
        return view('admin.kelolauser');
    }

    public function indexDetailPengguna()
    {
        return view('admin.detailuser');
    }

    public function indexBerita()
    {
        return view('admin.kelolaberita');
    }

    public function indexDetailBerita()
    {
        return view('admin.detailberita');
    }

    public function indexPengaduan()
    {
        return view('admin.kelolapengaduan');
    }

    public function indexDetailPengaduan()
    {
        return view('admin.detailpengaduan');
    }

    public function indexLaporan()
    {
        return view('admin.kelolalaporan');
    }

    public function indexDetailLaporan()
    {
        return view('admin.detaillaporan');
    }
}
