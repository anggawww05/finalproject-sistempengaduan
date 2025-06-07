<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'title',
        'decription',
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
