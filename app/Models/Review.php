<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'name',
        'email',
        'rating',
        'comment',
        'service_type',
        'approved',
    ];

    protected $casts = [
        'approved' => 'boolean',
        'rating' => 'integer',
    ];
}
