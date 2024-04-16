<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public mixed $bussiness_name;


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
        'is_active',
        'experience',
        'bussiness_name',
        'phone'
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


    /**
     * Get the products associated with the user.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the  messages associated with the user.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the  comments associated with the user.
     */
    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class, 'user_id');
    }


    /**
     * Get the  requested-cars  associated with the user.
     */
    public function carrequests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RequestCar::class);
    }
}
