<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\User;
use App\Models\Category;
use App\Models\Comments;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['title','content','user_id'];

      public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Categories(){

        return $this->belongsToMany(Category::class);
    }

     public function comments()
    {
        return $this->hasMany(Comments::class)->cascadeDelete();
    }
    

}
