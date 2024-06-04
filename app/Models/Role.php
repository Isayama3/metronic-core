<?php

namespace App\Models;

use App\Base\Traits\Model\FilterSort;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Role as SpatiRole;

class Role extends SpatiRole
{
    use  FilterSort, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
    
    public function getTable()
    {
        return $this->table ?? Str::snake(Str::pluralStudly(class_basename($this)));
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
            static::FilterSearchInAllColumns('search'),
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

    public function customPermissions()
    {
        $authIds = auth()->guard('admin-api')->user()->getAllPermissions()->pluck('id')->toArray();

        $Role = $this->permissions()->pluck('id')->toArray();

        $collection = new Collection();
        $permissions = Permission::get();
        foreach ($permissions as $permission) {
            $temp['id'] = $permission->id;
            $temp['name'] = $permission->name;
            $temp['group'] = $permission->group;
            $temp['status'] = false;
            if (in_array($permission->id, $Role)) {
                $temp['status'] = true;
            }

            if (auth()->guard('admin-api')->user()->roles?->first()?->name == 'super_admin') {
                $collection->push((object)$temp);
            } else {
                if (in_array($permission->id, $authIds)) {
                    $collection->push((object)$temp);
                }
            }
        }
        return $collection->groupBy('group');
    }
}
