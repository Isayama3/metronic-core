<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class SavedPlace extends BaseModel 
{
    protected $table = 'saved_places';
    public $timestamps = true;

    protected $fillable = [
        'latitude',
        'longitude',
        'address',
        'user_id',
        'type_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}