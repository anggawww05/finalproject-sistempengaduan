<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportPost extends Model
{
    protected $fillable = [
        'title',
        'description',
        'photo',
        'status',
        'like_id',
        'report_id',
        'user_id',
    ];

    public function reports()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function likes()
    {
        return $this->hasOne(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
