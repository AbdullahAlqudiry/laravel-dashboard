<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'guard_name',
    ];

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($role) {
            $role->syncPermissions([]);
        });
    }

    /**
     * Scopes
     */

    /**
    * Scope a query to only include popular users.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', '%' . $search . '%')
        ->orWhere('label', 'LIKE', '%' . $search . '%')
        ->orWhere('guard_name', 'LIKE', '%' . $search . '%');
    }

    /**
     * Functions
     */
    public static function syncDefaultPermissions()
    {
        // Sync Permissions
        $permissions = config('system.roles.permissions');

        foreach ($permissions as $permission) {
            $permissionObject = Permission::where(
                'name',
                $permission['name']
            )->first();

            if ($permissionObject == null) {
                Permission::create($permission);
            }
        }

        // Create Roles - Here create basic roles only
        $roles = config('system.roles.roles');
        foreach ($roles as $row) {
            $role = self::where('name', $row['name'])->first();

            if ($role == null) {
                $role = self::create(
                    [
                        'name' => strtolower($row['name']),
                        'label' => $row['label'],
                        'guard_name' => $row['guard_name']
                    ]
                );
            }

            if ($role->name == 'admin') {
                $role->syncPermissions(Permission::where('guard_name', 'web')->get());
            }
        }
    }
}
