<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\BlogPost;

class User extends Model implements Authenticatable, JWTSubject
{
    use HasRoles;
    use HasFactory;
    use AuthenticatableTrait;

    protected $fillable = ['name', 'email', 'password','role'];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

     public function blogposts()
    {
        return $this->hasMany(BlogPost::class);
    }

     public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
