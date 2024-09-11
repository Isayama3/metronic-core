<?php

namespace App\Models;

use App\Base\Models\Chat;
use App\Base\Traits\Custom\NotificationAttribute;
use App\Base\Traits\Model\FilterSort;
use App\Enums\UserVerificationStatus;
use App\Enums\VehicleVerificationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Schema;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, FilterSort, NotificationAttribute;

    protected $guarded = ['id', 'created_at', 'updated_at'];

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
    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            $model->load('verifications');
            if ($model->isDirty('phone'))
                $model->verifications->update(['phone_status_id' => UserVerificationStatus::UNVERIFIED]);

            if ($model->isDirty('email'))
                $model->verifications->update(['email_status_id' => UserVerificationStatus::UNVERIFIED]);
        });
    }

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

    public function getIsRegistrationCompletedAttribute(): bool
    {
        if (!$this->email || !$this->password) {
            return false;
        }

        return true;
    }

    public function getIsAllVerifiedForPublishRideAttribute(): bool
    {
        $user_verifications = $this->verifications->phone_status_id == UserVerificationStatus::VERIFIED
            && $this->verifications->national_id_card_status_id == UserVerificationStatus::VERIFIED
            && $this->verifications->driving_license_status_id == UserVerificationStatus::VERIFIED
            ? true : false;

        $vehicle_verifications = false;
        $user_vehicle = $this->vehicles->first();
        if ($user_vehicle) {
            $vehicle_verifications = $user_vehicle->verifications->license_status_id == VehicleVerificationStatus::VERIFIED
                ? true : false;
        }

        return $user_verifications && $vehicle_verifications;
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

    public function driverRideRequests()
    {
        return $this->hasMany(RideRequest::class, 'driver_id');
    }

    public function rideRequests()
    {
        return $this->hasMany(RideRequest::class, 'user_id');
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id');
    }

    public function sentChats()
    {
        return $this->morphMany(Chat::class, 'sender');
    }

    public function receivedChats()
    {
        return $this->morphMany(Chat::class, 'receiver');
    }

    public function getRatingAvgAttribute()
    {
        return $this->ratings->avg('rating') ?? 0;
    }

    public function ratings()
    {
        return $this->hasMany(RideReview::class, 'user_id');
    }
}
