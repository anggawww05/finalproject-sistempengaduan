<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\submissionExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmissionStoreRequest;
use App\Http\Requests\SubmissionUpdateRequest;
use App\Mail\SendEmail;
use App\Models\Category;
use App\Models\Submission;
use App\Models\SubmissionPost;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class SubmissionController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->operator_id) {
            if ($request->search) {
                $submissions = Submission::with(['user', 'category', 'submission_post'])
                    ->whereHas('category', function ($query) {
                        $query->where('name', auth()->user()->operator->type);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('ticket_number', 'like', "%$request->search%")
                            ->orWhere('title', 'like', "%$request->search%")
                            ->orWhere('description', 'like', "%$request->search%")
                            ->orWhere('status', 'like', "%$request->search%")
                            ->orWhere('available', 'like', "%$request->search%");
                    })
                    ->latest()
                    ->get();
            } else {
                $submissions = Submission::with(['user', 'category', 'submission_post'])
                    ->whereHas('category', function ($query) {
                        $query->where('name', auth()->user()->operator->type);
                    })
                    ->latest()
                    ->get();
            }
        } else {
            if ($request->search) {
                $submissions = Submission::with(['user', 'category', 'submission_post'])
                    ->where('ticket_number', 'like', "%$request->search%")
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
                $submissions = Submission::with(['user', 'category', 'submission_post'])->latest()->get();
            }
        }
        return view('dashboard.submission.index', [
            'title' => 'Halaman Pengajuan',
            'submissions' => $submissions,
            'search' => $request->search,
        ]);
    }

    public function show(Request $request, int $id)
    {
        if ($request->search) {
            $submissionTimelines = Timeline::with(['submission'])->where('submission_id', $id)
                ->where('title', 'like', "%$request->search%")
                ->orWhere('description', 'like', "%$request->search%")
                ->orWhere('status', 'like', "%$request->search%")
                ->latest()
                ->get();
        } else {
            $submissionTimelines = Timeline::with(['submission'])->where('submission_id', $id)->latest()->get();
        }
        return view('dashboard.submission.detail', [
            'title' => 'Halaman Detail Pengajuan',
            'submission' => Submission::with(['user', 'category', 'submission_post'])->where('id', $id)->firstOrFail(),
            'submissionTimelines' => $submissionTimelines,
            'search' => $request->search,
        ]);
    }

    public function export()
    {
        return Excel::download(new submissionExport(), 'laporan-pengajuan.xlsx');
    }

    public function create()
    {
        return view('dashboard.submission.create', [
            'title' => 'Halaman Tambah Pengajuan',
            'categories' => Category::all(),
        ]);
    }

    public function store(SubmissionStoreRequest $request)
    {
        try {
            $imagePath = null;
            if ($request->hasFile('image_path')) {
                $image = $request->file('image_path');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('submission', $imageName, 'public');
            }

            $submission = Submission::create([
                'image_path' => $imagePath,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'available' => $request->available,
            ]);

            $ticketNumber = substr(strtoupper(Str::of(Category::findOrFail($request->category_id)->name)->before(' ')), 0, 3) . '-' . $submission->id;
            $submission->update(['ticket_number' => $ticketNumber]);

            if ($request->available === 'public') {
                if ($request->hasFile('image_path')) {
                    $image = $request->file('image_path');
                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $imagePath = $image->storeAs('submission-post', $imageName, 'public');
                }

                SubmissionPost::create([
                    'image_path' => $imagePath,
                    'submission_id' => $submission->id,
                    'title' => $request->title,
                    'description' => $request->description,
                ]);
            }

            return redirect(route('dashboard.submission.index'))->with('success', 'Berhasil membuat pengajuan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('dashboard.submission.index'))->with('failed', 'Gagal membuat pengajuan!');
        }
    }

    public function edit(int $id)
    {
        return view('dashboard.submission.edit', [
            'title' => 'Halaman Edit Pengajuan',
            'categories' => Category::all(),
            'submission' => Submission::with(['user', 'category', 'submission_post'])->where('id', $id)->firstOrFail(),
        ]);
    }

    public function update(SubmissionUpdateRequest $request, int $id)
    {
        try {
            $submission = Submission::with(['user', 'category', 'submission_post'])->where('id', $id)->firstOrFail();
            $imagePath = $submission->image_path;

            if ($request->hasFile('image_path')) {
                if ($submission->image_path && Storage::disk('public')->exists($submission->image_path)) {
                    Storage::disk('public')->delete($submission->image_path);
                }

                $image = $request->file('image_path');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('submission', $imageName, 'public');
            }

            $submission->update([
                'image_path' => $imagePath,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'available' => $request->available,
            ]);

            if ($request->available === 'public') {
                if (!$submission->submission_post) {
                    $sourcePath = str_replace('storage/', '', $submission->image_path);
                    $targetPath = str_replace('submission/', 'submission-post/', $sourcePath);
                    Storage::disk('public')->copy($sourcePath, $targetPath);

                    SubmissionPost::create([
                        'image_path' => $imagePath,
                        'submission_id' => $submission->id,
                        'title' => $request->title,
                        'description' => $request->description,
                    ]);
                }
            } else {
                if ($submission->submission_post) {
                    if ($submission->submission_post->image_path && Storage::disk('public')->exists($submission->submission_post->image_path)) {
                        Storage::disk('public')->delete($submission->submission_post->image_path);
                    }

                    $submission->submission_post->delete();
                }
            }

            return redirect(route('dashboard.submission.index'))->with('success', 'Berhasil mengedit pengajuan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('dashboard.submission.index'))->with('failed', 'Gagal mengedit pengajuan!');
        }
    }

    public function destroy(int $id)
    {
        try {
            $submission = Submission::with(['user', 'category', 'submission_post'])->where('id', $id)->firstOrFail();

            if ($submission->image_path && Storage::disk('public')->exists($submission->image_path)) {
                Storage::disk('public')->delete($submission->image_path);
            }

            if ($submission->submission_post->image_path && Storage::disk('public')->exists($submission->submission_post->image_path)) {
                Storage::disk('public')->delete($submission->submission_post->image_path);
            }

            if ($submission->submission_post) $submission->submission_post->delete();
            $submission->delete();

            return redirect(route('dashboard.submission.index'))->with('success', 'Berhasil menghapus pengajuan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('dashboard.submission.index'))->with('success', 'Gagal menghapus pengajuan!');
        }
    }

    public function confirm(Request $request, int $id)
    {
        try {
            $submission = Submission::with(['user', 'category', 'submission_post'])->where('id', $id)->firstOrFail();

            if ($request->confirm == 1) {
                $submission->update(['status' => 'approved']);
                $this->sendEmail($id, 'disetujui');
            } else {
                $submission->update(['status' => 'rejected']);
                $this->sendEmail($id, 'ditolak');
            }

            return redirect(route('dashboard.submission.index'))->with('success', 'Berhasil mengubah status pengajuan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('dashboard.submission.index'))->with('success', 'Gagal mengubah status pengajuan!');
        }
    }

    public function sendEmail(int $id, string $status)
    {
        $submission = Submission::with(['user.student', 'category', 'submission_post'])->where('id', $id)->firstOrFail();

        $data = [
            'full_name' => $submission->user->student->full_name,
            'email' => $submission->user->email,
            'message' => 'Pengajuan kamu telah '. $status .' oleh admin'
        ];

        Mail::to($submission->user->email)->send(new SendEmail($data));
    }
}
