<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPost;
use App\Models\User;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = ['blogpost_id','user_id','content'];

    public function post()
      {

        return $this->belongsTo(BlogPost::class,'blogpost_id');
      }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
