<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrackController extends Controller
{
    public function index(Request $request): View
    {
        $submissions = null;
        if ($request->search) {
            $submissions = Submission::with(['user', 'category', 'submission_post'])
                ->whereNot('status', 'rejected')
                ->where('ticket_number', 'like', "%$request->search%")
                ->latest()
                ->get();
        }
        return view('homepage.track.index', [
            'title' => 'Halaman Lacak Pengaduan',
            'submissions' => $submissions,
        ]);
    }

    public function show(int $id): View
    {
        return view('homepage.track.detail', [
            'title' => 'Halaman Detail Pengaduan',
            'submission' => Submission::with(['timelines' => function ($query) {
                $query->orderBy('order', 'asc');
            }])->where('id', $id)->first(),
        ]);
    }
}
