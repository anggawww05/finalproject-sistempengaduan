<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportPostUpdateRequest;
use App\Models\ReportPost;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportPostController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->search) {
            $reportPosts = ReportPost::with(['report.user', 'report.category'])->where('title', 'like', "%$request->search%")
                ->orWhere('description', 'like', "%$request->search%")
                ->latest()
                ->get();
        } else {
            $reportPosts = ReportPost::latest()->get();
        }
        return view('dashboard.report-post.index', [
            'title' => 'Halaman Pengajuan Posting',
            'reportPosts' => $reportPosts,
            'search' => $request->search,
        ]);
    }

    public function show(int $id): View
    {
        return view('dashboard.report-post.detail', [
            'title' => 'Halaman Detail Pengajuan Posting',
            'reportPost' => ReportPost::with(['report.user', 'report.category'])->where('id', $id)->firstOrFail(),
        ]);
    }

    public function edit(int $id): View
    {
        return view('dashboard.report-post.edit', [
            'title' => 'Halaman Edit Pengajuan Posting',
            'reportPost' => ReportPost::with(['report.user', 'report.category'])->where('id', $id)->firstOrFail(),
        ]);
    }

    public function update(ReportPostUpdateRequest $request, int $id)
    {
        $reportPost = ReportPost::with(['report.user', 'report.category'])->where('id', $id)->firstOrFail();
        $imagePath = $reportPost->image_path;

        if ($request->hasFile('image_path')) {
            if ($reportPost->image_path && file_exists(public_path($reportPost->image_path))) {
                unlink(public_path($reportPost->image_path));
            }

            $image = $request->file('image_path');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/report-post'), $imageName);
            $imagePath = 'images/report-post/' . $imageName;
        }

        $reportPost->update([
            'image_path' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($reportPost) return redirect(route('dashboard.report-post.index'))->with('success', 'Berhasil mengedit pengajuan posting!');
        return redirect(route('dashboard.report-post.index'))->with('failed', 'Gagal mengedit pengajuan posting!');
    }

    public function destroy(int $id)
    {
        $reportPost = ReportPost::with(['report.user', 'report.category'])->where('id', $id)->firstOrFail();
        $reportPost->report->update([
            'available' => 'private'
        ]);

        if ($reportPost->image_path && file_exists(public_path($reportPost->image_path))) {
            unlink(public_path($reportPost->image_path));
        }

        $reportPost->delete();

        return redirect(route('dashboard.report-post.index'))->with('success', 'Berhasil menghapus pengajuan posting!');
    }
}
