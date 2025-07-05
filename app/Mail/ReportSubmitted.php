<?php

namespace App\Mail;

use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $report;

    public function __construct(Submission $report)
    {
        $this->report = $report;
    }

    public function build()
    {
        return $this->subject('Laporan Anda Berhasil Dikirim')
                    ->view('emails.report_submitted');
    }
}
