<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        // 'name',
        // 'email',
        // 'password',
        'mobile',
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

    public const CASTE = [
        'Digamber',
        'Sthanakvasi',
        'Deravasi',
        'Terapanthi',
        'Kutchi'
    ];

    public const MOTHER_TONGUE = [
        'Gujarati',
        'Marwari',
        'Hindi',
        'Kutchi'
    ];

    public const QUALIFICATION = [
        'SSC',
        'HSC',
        'GRADUATE',
        'POST-GRADUATE',
        'OTHER',
    ];

    public const EDUCATION_MEDIUM = [
        'Gujarati',
        'English',
        'Hindi',
    ];

    public const OCCUPATION = [
        'Business',
        'Salaried',
        'Professional',
        'Other',
    ];

    public const MOTHER_OCCUPATION = [
        'Housewife',
        'Business',
        'Salaried',
        'Professional',
        'Other',
    ];

    public const FAMILY_RELATION = [
        'Friend',
        'Relative',
    ];

    public const BLOOD_GROUP = [
        'A+',
        'B+',
        'O+',
        'AB+',
        'A-',
        'B-',
        'O-',
        'AB-',
    ];

    public const MARTIAL_STATUS = [
        'Unmarried',
        'Engagement Broken',
        'Widowed',
        'Divorced',
        'Separated',
    ];

    public const CHILDREN_STATUS = [
        'Living With Me',
        'Not Living With Me',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function shortlists()
    {
        return $this->hasMany(Shortlist::class);
    }

    public function othersShortlistedCount()
    {
        return Shortlist::where('shortlisted_id', $this->id)->count();
    }

    public function shortlisted()
    {
        return auth()->user()->shortlists()->where('shortlisted_id', $this->id)->exists();
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getActiveSubscription()
    {
        return $this->subscriptions()->where('is_active', 1)->where('end_date', '>', now())->first();
    }

    public function userReference()
    {
        return $this->hasMany(UserReference::class);
    }

    public function images()
    {
        return $this->morphMany(Media::class, 'model');
    }
}
