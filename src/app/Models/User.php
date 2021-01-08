<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($user) {
            $user->syncRoles([]);
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
        ->orWhere('name', 'LIKE', '%' . $search . '%')
        ->orWhere('email', 'LIKE', '%' . $search . '%');
    }

    /**
     * relations
     */

    /**
     * Attributes
     */
    public function getRoleIdsAttribute()
    {
        $rolesId = $this->roles()->pluck('id')->toArray();
        return $rolesId;
    }

    public function getRoleLabelsAttribute()
    {
        $rolesLabel = $this->roles()->pluck('label')->toArray();
        return implode('<br />', $rolesLabel);
    }

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

    public static function isActiveValues()
    {
        return [
            true => __('trans.Active'),
            false => __('trans.Disabled'),
        ];
    }
}
