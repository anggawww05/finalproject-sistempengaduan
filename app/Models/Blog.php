<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'description',
        'photo',
        'blog_photo',
        'report_id',
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
