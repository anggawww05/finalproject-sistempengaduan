<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'report_post_id',
    ];

    public function ReportPost()
    {
        return $this->belongsToMany(ReportPost::class);
    }
}
