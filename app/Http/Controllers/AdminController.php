<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->search) {
            $admins = Admin::where('full_name', 'like', "%$request->search%")
                ->orWhere('phone_number', 'like', "%$request->search%")
                ->orWhereHas('user', function ($query) use ($request) {
                    $query->where('username', 'like', "%$request->search%")
                        ->where('email', 'like', "%$request->search%");
                })
                ->latest()
                ->get();
        } else {
            $admins = Admin::latest()->get();
        }
        return view('dashboard.admin.index', [
            'title' => 'Halaman Admin',
            'admins' => $admins,
            'search' => $request->search,
        ]);
    }

    public function show(int $id): View
    {
        return view('dashboard.admin.detail', [
            'title' => 'Halaman Detail Admin',
            'admin' => Admin::with('user')->where('id', $id)->firstOrFail(),
        ]);
    }

//    public function indexPengguna()
//    {
//        return view('admin.kelolauser');
//    }
//
//    public function indexDetailPengguna()
//    {
//        return view('admin.detailuser');
//    }
//
//    public function indexBerita()
//    {
//        return view('admin.kelolaberita');
//    }
//
//    public function indexDetailBerita()
//    {
//        return view('admin.detailberita');
//    }
//
//    public function indexPengaduan()
//    {
//        return view('admin.kelolapengaduan');
//    }
//
//    public function indexDetailPengaduan()
//    {
//        return view('admin.detailpengaduan');
//    }
//
//    public function indexLaporan()
//    {
//        return view('admin.kelolalaporan');
//    }
//
//    public function indexDetailLaporan()
//    {
//        return view('admin.detaillaporan');
//    }
}
