<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function viewForm()
    {
        $category = Category::all();
        return view('user.formulirakademik', compact('category'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $reportCount = Report::where('status', 'approve')->count() + 1;
        $reportNumber = str_pad($reportCount, 3, '0', STR_PAD_LEFT);
        $date = date('dmY');
        $random = strtoupper(Str::random(4));
        $validated['ticket_number'] = 'SIPMA-' . $reportNumber . '-' . $date . '-' . $random;
        $validated['status'] = 'pending';
        $validated['available'] = null;
        $validated['user_id'] = $user->id;
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Report::create($validated);

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim.');
    }
}
