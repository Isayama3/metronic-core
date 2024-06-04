<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class UserReport extends BaseModel
{
    protected $table = 'user_reports';
    public $timestamps = true;

    protected $fillable = [
        'reporter_id',
        'reported_id',
        'description',
        'ride_id',
    ];

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporting_id');
    }

    public function reported()
    {
        return $this->belongsTo(User::class, 'reported_id');
    }

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }
}
