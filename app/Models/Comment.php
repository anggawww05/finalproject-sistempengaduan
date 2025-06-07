<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'report_post_id',
        'description',
    ];

    public function ReportPost()
    {
        return $this->belongsToMany(ReportPost::class);
    }
}
