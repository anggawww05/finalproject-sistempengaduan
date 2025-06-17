<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function viewForm()
    {
        $category = Category::all();
        return view('user.formulirakademik', compact('category'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'ticket_number' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'in:pending,approved,rejected',
            'available' => 'nullable|in:public,private',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Upload file jika ada
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        // Tambahkan user_id dari user yang sedang login
        $validated['user_id'] = Auth::id();

        // Simpan ke database
        Report::create($validated);

        // Redirect atau response
        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim.');
    }
}
