<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'avatar',
        'profileUrl'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getAvatar()
    {
        return 'https://www.gravatar.com/avatar/x?' . md5($this->email) . 's=45&d=mm';
    }

    public function getAvatarAttribute()
    {
        return $this->getAvatar();
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function getProfileUrlAttribute()
    {
        return route('user.index', $this);
    }

    public function isNot(User $user)
    {
        return $this->id !== $user->id;
    }

    public function isFollowing(User $user)
    {
        return (bool) $this->following->where('id', $user->id)->count();
    }

    public function canFollow(User $user)
    {
        if (!$this->isNot($user))
        {
            return false;
        }
        return (bool) !$this->isFollowing($user);
    }

    public function canUnFollow(User $user)
    {
        return $this->isFollowing($user);
    }

    public function following()
    {
        return $this->belongsToMany('App\User', 'follows', 'user_id', 'follower_id');
    }

    public function followers()
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'user_id');
    }
}
