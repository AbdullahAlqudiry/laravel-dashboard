<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $fillable = [
        'name',
        'label',
        'guard_name',
        'group_key',
    ];

    /**
     * Scopes
     */

    /**
     * Scope a query to only include web guard
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWebGuard($query)
    {
        return $query->where('guard_name', 'web');
    }

    /**
     * Scope a query to only include web guard
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWebServiceGuard($query)
    {
        return $query->where('guard_name', 'webService');
    }
}
