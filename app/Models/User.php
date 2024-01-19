<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'role',
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
        'password' => 'hashed',
    ];

    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';

    public static function roles(): array
    {
        return [
            self::ROLE_USER,
            self::ROLE_ADMIN,
        ];
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string|array $role The role(s) to check.
     * @return bool Returns true if the user has the specified role(s), false otherwise.
     */
    public function hasRole(string|array $role): bool
    {
        return in_array($this->role, (array) $role);
    }
    /**
     * Set the user's last activity date.
     *
     * @return void
     */
    public function setLastActivity(): void
    {
        Model::withoutTimestamps(function () {
            $this->last_activity = now();
            $this->save();
        });
    }

    protected static function boot(): void
    {
        parent::boot();
    }
}
