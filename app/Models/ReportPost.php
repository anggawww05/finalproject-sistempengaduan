<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportPost extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
