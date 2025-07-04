<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportStoreRequest;
use App\Http\Requests\ReportUpdateRequest;
use App\Models\Report;
use App\Models\Category;
use App\Models\ReportPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->search) {
            $reports = Report::with(['user', 'category', 'report_post'])->where('ticket_number', 'like', "%$request->search%")
                ->orWhere('title', 'like', "%$request->search%")
                ->orWhere('description', 'like', "%$request->search%")
                ->orWhere('status', 'like', "%$request->search%")
                ->orWhere('available', 'like', "%$request->search%")
                ->orWhereHas('user', function ($query) use ($request) {
                    $query->where('username', 'like', "%$request->search%")
                        ->where('email', 'like', "%$request->search%");
                })->orWhereHas('category', function ($query) use ($request) {
                    $query->where('name', 'like', "%$request->search%");
                })
                ->latest()
                ->get();
        } else {
            $reports = Report::with(['user', 'category', 'report_post'])->latest()->get();
        }
        return view('dashboard.report.index', [
            'title' => 'Halaman Pengajuan',
            'reports' => $reports,
            'search' => $request->search,
        ]);
    }

    public function show(int $id): View
    {
        return view('dashboard.report.detail', [
            'title' => 'Halaman Detail Pengajuan',
            'report' => Report::with(['user', 'category', 'report_post'])->where('id', $id)->firstOrFail(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.report.create', [
            'title' => 'Halaman Tambah Pengajuan',
            'categories' => Category::all(),
        ]);
    }

    public function store(ReportStoreRequest $request)
    {
        $imagePath = null;
        $ticketNumber = strtoupper(Str::of(Category::findOrFail($request->category_id)->name)->before(' ')) . '-' . Str::upper(Str::random(10));
        $originalImageName = null;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/report'), $imageName);
            $imagePath = 'images/report/' . $imageName;
            $originalImageName = $imageName;
        }

        $report = Report::create([
            'image_path' => $imagePath,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'ticket_number' => $ticketNumber,
            'title' => $request->title,
            'description' => $request->description,
            'available' => $request->available,
        ]);

        if ($request->available === 'public') {
            $sourcePath = public_path('images/report/' . $originalImageName);
            $targetPath = public_path('images/report-post/' . $originalImageName);

            if (file_exists($sourcePath)) {
                copy($sourcePath, $targetPath);
            }

            ReportPost::create([
                'image_path' => 'images/report-post/' . $originalImageName,
                'report_id' => $report->id,
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        if ($report) return redirect(route('dashboard.report.index'))->with('success', 'Berhasil membuat pengajuan!');
        return redirect(route('dashboard.report.index'))->with('failed', 'Gagal membuat pengajuan!');
    }

    public function edit(int $id): View
    {
        return view('dashboard.report.edit', [
            'title' => 'Halaman Edit Pengajuan',
            'categories' => Category::all(),
            'report' => Report::with(['user', 'category', 'report_post'])->where('id', $id)->firstOrFail(),
        ]);
    }

    public function update(ReportUpdateRequest $request, int $id)
    {
        $report = Report::with(['user', 'category', 'report_post'])->where('id', $id)->firstOrFail();
        $imagePath = $report->image_path;
        $originalImageName = null;

        if ($request->hasFile('image_path')) {
            if ($report->image_path && file_exists(public_path($report->image_path))) {
                unlink(public_path($report->image_path));
            }

            $image = $request->file('image_path');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/report'), $imageName);
            $imagePath = 'images/report/' . $imageName;
            $originalImageName = $imageName;
        } else {
            $originalImageName = str_replace('images/report/', '', $imagePath);
        }

        $report->update([
            'image_path' => $imagePath,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'available' => $request->available,
        ]);

        if ($request->available === 'public') {
            if (!$report->report_post) {
                $sourcePath = public_path('images/report/' . $originalImageName);
                $targetPath = public_path('images/report-post/' . $originalImageName);

                if (file_exists($sourcePath)) {
                    copy($sourcePath, $targetPath);
                }

                ReportPost::create([
                    'image_path' => 'images/report-post/' . $originalImageName,
                    'report_id' => $report->id,
                    'title' => $request->title,
                    'description' => $request->description,
                ]);
            }
        } else {
            if ($report->report_post) {
                if ($report->report_post && $report->report_post->image_path && file_exists(public_path($report->report_post->image_path))) {
                    unlink(public_path($report->report_post->image_path));
                }

                $report->report_post->delete();
            }
        }

        if ($report) return redirect(route('dashboard.report.index'))->with('success', 'Berhasil mengedit pengajuan!');
        return redirect(route('dashboard.report.index'))->with('failed', 'Gagal mengedit pengajuan!');
    }

    public function destroy(int $id)
    {
        $report = Report::with(['user', 'category', 'report_post'])->where('id', $id)->firstOrFail();

        if ($report->image_path && file_exists(public_path($report->image_path))) {
            unlink(public_path($report->image_path));
        }

        if ($report->report_post && $report->report_post->image_path && file_exists(public_path($report->report_post->image_path))) {
            unlink(public_path($report->report_post->image_path));
        }

        if ($report->report_post) $report->report_post->delete();
        $report->delete();

        return redirect(route('dashboard.report.index'))->with('success', 'Berhasil menghapus pengajuan!');
    }

//    public function viewForm()
//    {
//        $category = Category::all();
//        return view('user.formulirakademik', compact('category'));
//    }
//
//    public function store(Request $request)
//    {
//        $user = Auth::user();
//        $validated = $request->validate([
//            'title' => 'required|string|max:255',
//            'description' => 'required|string',
//            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
//            'category_id' => 'required|exists:categories,id',
//        ]);
//
//        $reportCount = Report::where('status', 'approve')->count() + 1;
//        $reportNumber = str_pad($reportCount, 3, '0', STR_PAD_LEFT);
//        $date = date('dmY');
//        $random = strtoupper(Str::random(4));
//        $validated['ticket_number'] = 'SIPMA-' . $reportNumber . '-' . $date . '-' . $random;
//        $validated['status'] = 'pending';
//        $validated['available'] = null;
//        $validated['user_id'] = $user->id;
//        if ($request->hasFile('photo')) {
//            $validated['photo'] = $request->file('photo')->store('photos', 'public');
//        }
//
//        Report::create($validated);
//
//        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim.');
//    }
}
