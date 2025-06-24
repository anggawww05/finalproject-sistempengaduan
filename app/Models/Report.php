<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'ticket_number',
        'title',
        'description',
        'photo',
        'status',
        'available',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ReportPosts()
    {
        return $this->hasOne(ReportPost::class);
    }

    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }
}
