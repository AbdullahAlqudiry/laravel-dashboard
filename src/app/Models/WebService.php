<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class WebService extends Authenticatable
{
    use HasFactory, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'api_token',
        'is_active',
    ];

    protected $guard_name = 'webService';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'api_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($webService) {
            $webService->api_token = Str::random(40);
        });

        self::deleting(function ($webService) {
            $webService->syncPermissions([]);
        });
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('id', 'LIKE', '%' . $search . '%')
        ->orWhere('name', 'LIKE', '%' . $search . '%')
        ->orWhere('api_token', 'LIKE', '%' . $search . '%');
    }

    /**
     * relations
     */

    /**
     * Attributes
     */
    public function getReadableIsActiveAttribute()
    {
        switch ($this->is_active) {
            case true:
                return __('trans.Active');
            break;

            case false:
                return __('trans.Disabled');
            break;
        }
    }
}
