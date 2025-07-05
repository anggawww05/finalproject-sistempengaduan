<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimelineStoreRequest;
use App\Http\Requests\TimelineUpdateRequest;
use App\Models\Submission;
use App\Models\Timeline;

class TimelineController extends Controller
{
    public function show(int $submission_id, int $timeline_id)
    {
        return view('dashboard.timeline.detail', [
            'title' => 'Halaman Detail Pengajuan Timeline',
            'submission' => Submission::with(['user', 'category', 'submission_post', 'timelines'])->where('id', $submission_id)->firstOrFail(),
            'timeline' => Timeline::where('id', $timeline_id)->firstOrFail(),
        ]);
    }

    public function create(int $submission_id)
    {
        return view('dashboard.timeline.create', [
            'title' => 'Halaman Tambah Pengajuan Timeline',
            'submission' => Submission::with(['user', 'category', 'submission_post', 'timelines'])->where('id', $submission_id)->firstOrFail(),
        ]);
    }

    public function store(TimelineStoreRequest $request, int $submission_id)
    {
        try {
            $submission = Submission::with(['user', 'category', 'submission_post', 'timelines'])->where('id', $submission_id)->firstOrFail();

            Timeline::create([
                'submission_id' => $request->submission_id,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'order' => $request->order,
            ]);

            return redirect(route('dashboard.submission.show', $submission))->with('success', 'Berhasil membuat pengajuan timeline!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('dashboard.submission.show', $submission))->with('failed', 'Gagal membuat pengajuan timeline!');
        }
    }

    public function edit(int $submission_id, int $timeline_id)
    {
        return view('dashboard.timeline.edit', [
            'title' => 'Halaman Edit Pengajuan Timeline',
            'submission' => Submission::with(['user', 'category', 'submission_post', 'timelines'])->where('id', $submission_id)->firstOrFail(),
            'timeline' => Timeline::where('id', $timeline_id)->firstOrFail(),
        ]);
    }

    public function update(TimelineUpdateRequest $request, int $submission_id, int $timeline_id)
    {
        try {
            $submission = Submission::with(['user', 'category', 'submission_post', 'timelines'])->where('id', $submission_id)->firstOrFail();
            $timeline = Timeline::where('id', $timeline_id)->firstOrFail();

            $timeline->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'order' => $request->order,
            ]);

            return redirect(route('dashboard.submission.show', $submission))->with('success', 'Berhasil mengedit pengajuan timeline!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('dashboard.submission.show', $submission))->with('failed', 'Gagal mengedit pengajuan timeline!');
        }
    }

    public function destroy(int $submission_id, int $timeline_id)
    {
        try {
            $submission = Submission::with(['user', 'category', 'submission_post', 'timelines'])->where('id', $submission_id)->firstOrFail();
            $timeline = Timeline::where('id', $timeline_id)->firstOrFail();
            $timeline->delete();

            return redirect(route('dashboard.submission.show', $submission))->with('success', 'Berhasil menghapus pengajuan timeline!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('dashboard.submission.show', $submission))->with('failed', 'Gagal menghapus pengajuan timeline!');
        }
    }

//    public function indexTimeline()
//    {
//        return view('user.timeline');
//    }
//
//    public function indexDetailTimeline()
//    {
//        return view('user.detailtimeline');
//    }
}
