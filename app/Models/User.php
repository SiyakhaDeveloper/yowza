<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
        'lastname',
        'email',
        'password',
        'about',
        'location',
        'profile_image',
        'social_twitter',
        'social_facebook',
        'social_instagram',
        'social_linkedin',
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

    public function videos()
    {
        return $this->hasMany(SocialEnterpriseVideo::class);
    }
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function isAdmin()
    {
        return $this->role()->where('role_id', 1)->first();
    }

    public function funderQuestion()
    {
        return $this->hasOne(FunderQuestion::class);
    }

//    public function socialEnterprise()
//    {
//        return $this->hasOne(SocialEnterprise::class);
//    }

    public function socialEnterprise(): HasMany
    {
        return $this->hasMany(SocialEnterprise::class);
    }

    public function applications()
    {
        return $this->hasMany(Applications::class);
    }

    public function volunteer()
    {
        return $this->hasOne(Volunteer::class);
    }

    public function volunteerApplications()
    {
        return $this->hasMany(VolunteerApplication::class);
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    public function volunteerQuestions(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(VolunteerQuestion::class);
    }

    public function downloadHistories(): HasMany
    {
        return $this->hasMany(DownloadHistory::class, 'user_id');
    }
}
