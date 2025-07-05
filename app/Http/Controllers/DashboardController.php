<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $submissionYear = [];
        $submissionMonth = [];

        $months = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        ];
        $weeks = [
            'Minggu 1' => [Carbon::create($currentYear, $currentMonth, 1), Carbon::create($currentYear, $currentMonth, 7)],
            'Minggu 2' => [Carbon::create($currentYear, $currentMonth, 8), Carbon::create($currentYear, $currentMonth, 14)],
            'Minggu 3' => [Carbon::create($currentYear, $currentMonth, 15), Carbon::create($currentYear, $currentMonth, 21)],
            'Minggu 4' => [Carbon::create($currentYear, $currentMonth, 22), Carbon::create($currentYear, $currentMonth, Carbon::create($currentYear, $currentMonth)->endOfMonth()->day)],
        ];

        $submissionYearValue = Submission::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'month');

        foreach ($months as $monthNumber => $monthName) {
            $submissionYear[$monthName] = $submissionYearValue[$monthNumber] ?? 0;
        }

        foreach ($weeks as $label => [$start, $end]) {
            $count = Submission::whereBetween('created_at', [$start->startOfDay(), $end->endOfDay()])->count();
            $submissionMonth[$label] = $count;
        }

        $submissionCategory = Category::withCount('submissions')
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->name => $category->submissions_count];
            });

        return view('dashboard.index', [
            'title' => 'Halaman Dashboard',
            'submission_year' => $submissionYear,
            'submission_month' => $submissionMonth,
            'submission_category' => $submissionCategory,
            'categories' => Category::all(),
        ]);
    }
}
