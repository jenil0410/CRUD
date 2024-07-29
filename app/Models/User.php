<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'Role_id', 'id');
    }

    public function roles()
    {
        return $this->hasMany(Role::class, 'id', 'Role_id');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'Role_id', 'Role_id');
    }

    public function hasRolePermission($module)
    {
        if ($this->permissions()->where('module', $module)->first()) {
            return true;
        }
        return false;
    }

    public function hasRoleCRUDPermission($module,$permission)
    {
        if ($this->permissions()->where([['module', $module],[$permission,'on']])->first()) {
            return true;
        }
        return false;
    }

    public function getrole()
    {
        return $this->belongsTo(Role::class, 'Role_id');
    }

    
}
