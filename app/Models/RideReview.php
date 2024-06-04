<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class RideReview extends BaseModel
{
    protected $table = 'ride_reviews';
    public $timestamps = true;

    protected $fillable = [
        'ride_id',
        'user_id',
        'rating',
        'review',
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
