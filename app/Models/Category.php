<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPost;

class Category extends Model
{
    use HasFactory;
   protected $fillable = ['name','description'];
    public function posts(){

        return $this->belongsToMany(BlogPost::class);
    }
}
