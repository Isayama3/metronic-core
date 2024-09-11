<?php

namespace App\Models;

use App\Base\Models\BaseModel;
use Core\Base\Models\Base;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Permission extends BaseModel
{

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->guard_name =  'admin';
        });
    }
    
    protected function routes(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => 'admin.' . $value,
        );
    }
}
