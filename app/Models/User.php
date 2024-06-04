<?php

namespace App\Models;

use App\Base\Traits\Model\FilterSort;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Schema;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, FilterSort;

    protected $fillable = [
        'full_name',
        'email',
        'email_verified_at',
        'country_code',
        'phone',
        'password',
        'is_smoking',
        'active',
        'latitude',
        'longitude',
        'birthday',
        'image',
        'fcm_token',
        'nationality_id',
        'language_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'country_code' => 'integer',
        'phone' => 'integer',
        'is_smoking' => 'boolean',
        'active' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public static function getTableName()
    {
        return with(new static())->getTable();
    }

    public static function MyColumns()
    {
        return Schema::getColumnListing(self::getTableName());
    }

    public static function filterColumns(): array
    {
        return array_merge(self::MyColumns(), [
            static::createdAtBetween('created_from'),
            static::createdAtBetween('created_to'),
            static::filterSearchInAllColumns('search'),
        ]);
    }

    public static function sortColumns(): array
    {
        return self::MyColumns();
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => (bcrypt($value)),
        );
    }

    public function deleteRelations(): array
    {
        return [];
    }

    public function getFullPhoneAttribute(): string
    {
        return $this->country_code . $this->phone;
    }

    public function getImageUrlAttribute(): string
    {
        if (app()->environment('local')) {
            if (isset($this->attributes['image']) && !is_null($this->attributes['image']))
                return asset($this->attributes['image']);

            return asset("dashboard/blank.jpg");
        }

        if (isset($this->attributes['image']) && !is_null($this->attributes['image']))
            return secure_asset($this->attributes['image']);

        return secure_asset("dashboard/blank.jpg");
    }

    public function verifications()
    {
        return $this->hasOne(UserVerification::class, 'user_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'user_id');
    }

    public function rides()
    {
        return $this->hasMany(Ride::class, 'user_id');
    }

    public function getIsRegistrationCompletedAttribute(): bool
    {
        if (!$this->email || !$this->password) {
            return false;
        }
        
        return true;
    }
}
