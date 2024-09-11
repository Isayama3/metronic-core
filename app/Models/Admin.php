<?php

namespace App\Models;

use App\Base\Traits\Custom\NotificationAttribute;
use App\Base\Traits\Model\FilterSort;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use FilterSort, HasRoles, NotificationAttribute, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public $timestamps = true;

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

    public function deleteRelations(): array
    {
        return [];
    }

    public function getIsAgentAttribute(): bool
    {
        return $this->hasRole('agent');
    }

    public function getImageUrlAttribute(): string
    {
        if (app()->environment('local')) {
            if (isset($this->attributes['image']) && !is_null($this->attributes['image'])) {
                return asset($this->attributes['image']);
            }

            return asset("dashboard/blank.jpg");
        }

        if (isset($this->attributes['image']) && !is_null($this->attributes['image'])) {
            return secure_asset($this->attributes['image']);
        }

        return secure_asset("dashboard/blank.jpg");
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn($value) => (bcrypt($value)),
        );
    }

    public function wallet()
    {
        return $this->hasOne(AgentWallet::class, 'admin_id');
    }

    public function bank_account()
    {
        return $this->hasMany('BankAccount');
    }
}
