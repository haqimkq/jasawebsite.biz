<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'isAdmin',
        'isSupport',
        'no_hp',
        'image',
        'isShowPoint',
        'isMember'
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

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function todos()
    {
        return $this->belongsToMany(Todo::class, 'user_todo', 'user_id', 'todo_id');
    }
    public function cronjobs()
    {
        return $this->belongsToMany(Cronjob::class, 'cronjob_user', 'user_id', 'cronjob_id');
    }
    public function youtube()
    {
        return $this->belongsToMany(Youtube::class, 'user_youtube');
    }
}
