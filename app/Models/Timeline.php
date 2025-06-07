<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $fillable = [
        'title',
        'description',
        'report_id',
    ];

    public function Report()
    {
        return $this->belongsTo(Report::class);
    }
}
