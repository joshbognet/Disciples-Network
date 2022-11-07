<?php

namespace App\Models;

use App\Traits\Likeable;
use App\Traits\Friendable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Friendable;
    use Likeable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $with =['profile'];

    protected function defaultProfilePhotoUrl()
    {
        return asset('/storage/images/profile2.jpg');
    }
    public function profile(){
        return $this->hasOne(Profile::class);

    }

    public function scopeSuggestions($query){
        return $query->notAuth()->orWhereIn('id', auth()->user()->friends_ids());
    }

    public function scopeNotAuth(){
        return $this->where('id', '!=', auth()->id());
    }

    public function posts(){
        return $this->hasMany(Post::class);

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);

    }

    public function replies() {
        return $this->hasMany(Reply::class);
    }
}
