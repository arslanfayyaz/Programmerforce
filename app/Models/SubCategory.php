<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post1;

class SubCategory extends Model
{
    use HasFactory;
    protected $guard=[];
    public function post(){
        return $this->hasMany(Post1::class);
    }
}
