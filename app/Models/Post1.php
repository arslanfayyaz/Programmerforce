<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Post1 extends Model
{
    use HasFactory;
    protected $guard=[];
    public function subcategory(){

        return $this->belongsTo(SubCategory::class);
    }
}
