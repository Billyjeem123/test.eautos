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
        'business_name',
        'phone',
        'profile_image',
        'country',
        'business_state'.
        'business_location',
        'organisation_services'
    ];

//    public ?string $business_name = null;

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



    public function profileCompletionPercentage(): float|int
    {
        // Define the required fields for the profile
        $requiredFields = [
            'name', 'email', 'phone', 'state', 'experience', 'business_name',
            'about', 'image', 'business_state', 'business_location'
        ];

        // Initialize the total completion score
        $totalCompletionScore = 0;

        // Calculate the total completion score
        foreach ($requiredFields as $field) {
            if ($this->$field) {
                // Each filled field contributes a weight of 10 to the total completion score
                $totalCompletionScore += 10;
            }
        }

        // Calculate the profile completion percentage
        $totalPossibleScore = count($requiredFields) * 10;
        return ($totalCompletionScore / $totalPossibleScore) * 100;
    }







    /**
     * Get the part  associated with the user.
     */
    public function parts()
    {
        return $this->hasMany(Part::class, );
    }

    /**
     * Get the  comments associated with the user.
     */
    public function bussiness_reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BussinessReview::class, 'user_id');
    }

    /**
     * Get the  user associated with  stolen car reported
     */
    public function stolen_car(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StolenCar::class, 'user_id');
    }


    /**
     * The groups that the user belongs to.
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user', 'user_id', 'group_id');
    }


    /**
     * Get the business services associated with the user.
     */

    public function businessServiceLists()
    {
        return $this->belongsToMany(BussinessServiceList::class, 'business_services', 'user_id', 'bussiness_name');
    }
}
