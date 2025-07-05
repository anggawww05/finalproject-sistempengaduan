<?php

namespace App\Exports;

use App\Models\Submission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class submissionExport implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $search = request('search');

        $submissions = Submission::with(['user', 'category'])
            ->when(auth()->user()->operator, function ($query) {
                $query->whereHas('category', function ($query) {
                    $query->where('name', auth()->user()->operator->type);
                });
            })->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('ticket_number', 'like', "%{$search}%")
                        ->orWhere('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%")
                        ->orWhere('available', 'like', "%{$search}%");
                });
            })
            ->get();

        return $submissions->map(function ($submission) {
            return [
                $submission->user->username ?? '-',
                $submission->category->name ?? '-',
                $submission->ticket_number,
                $submission->title,
                $submission->description,
                $submission->status,
                $submission->available,
            ];
        });
    }

    public function headings(): array
    {
        return ["Pembuat", "Kategori", "Tiket", "Judul", "Deskripsi", "Status", "Status Publish"];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 20,
            'G' => 20,
        ];
    }

}
