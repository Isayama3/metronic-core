<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Ride extends BaseModel
{
    protected $table = 'rides';
    public $timestamps = true;

    protected $fillable = [
        'pickup_address',
        'pickup_latitude',
        'pickup_longitude',
        'dropoff_address',
        'dropoff_latitude',
        'dropoff_longitude',
        'date_schedule',
        'passengers_limit',
        'instant_booking',
        'price_per_seat',
        'is_publish',
        'middle_seat_empty',
        'notes',
        'total_price',
        'user_id',
        'vehicle_id',
        'status_id'
    ];

    protected $casts = [
        'pickup_latitude' => 'decimal:6',
        'pickup_longitude' => 'decimal:6',
        'dropoff_latitude' => 'decimal:6',
        'dropoff_longitude' => 'decimal:6',
        'date_schedule' => 'datetime',
        'passengers_limit' => 'integer',
        'instant_booking' => 'boolean',
        'price_per_seat' => 'double',
        'is_publish' => 'boolean',
        'middle_seat_empty' => 'boolean',
        'total_price' => 'double',
        'user_id' => 'integer',
        'vehicle_id' => 'integer',
        'rating_avg' => 'integer'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function requests()
    {
        return $this->hasMany(RideRequest::class);
    }

    public function stopovers()
    {
        return $this->hasMany(RideStopover::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function getRatingAvgAttribute()
    {
        return $this->ratings->avg('rating');
    }

    public function ratings()
    {
        return $this->hasMany(RideReview::class);
    }
}
