<?php

namespace App\Models;

use App\Base\Traits\Model\FilterSort;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use FilterSort, HasRoles;
    protected $table = 'admins';
    public $timestamps = true;

    protected $fillable = [
        'full_name',
        'email',
        'country_code',
        'phone',
        'password',
        'active',
        'country_id',
        'language_id',
        'type_id'
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

    public function deleteRelations(): array
    {
        return [];
    }

    public function getImageUrlAttribute(): string
    {
        return $this->getImageUrl('image');
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => (bcrypt($value)),
        );
    }

    public function safe()
    {
        return $this->hasOne('Safe');
    }

    public function bank_account()
    {
        return $this->hasMany('BankAccount');
    }
}
