<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User1;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
                        'category_id','name','description',
                        'user1_id','name','role',
                    ];

    public function user1(){
        return $this->belongsTo(User1::class,'user1_id');
    }
    public function category(){
         return $this->belongsTo(Category::class,'category_id');
    }
}
