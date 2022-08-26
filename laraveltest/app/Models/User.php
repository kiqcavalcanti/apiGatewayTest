<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function hasRole(string $role) {

        $resource = Config::get('keycloak.allowed_resources');

        if(count(explode(',', $resource)) > 1) {
            throw new \DomainException('Only one Resource is allowed');
        }

        return Auth::hasRole($resource, $role);
    }

    public function roles() {

        $resource = Config::get('keycloak.allowed_resources');

        if(count(explode(',', $resource)) > 1) {
            throw new \DomainException('Only one Resource is allowed');
        }

        return data_get($this->token, "resource_access.$resource.roles");
    }

    public function getNameAttribute()
    {
        return data_get($this->attributes, 'token.name');
    }
}
