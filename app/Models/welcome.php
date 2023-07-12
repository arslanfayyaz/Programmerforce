<?php

namespace App\Models;
use Illuminate\Support\Facades\File;

class welcome{


        public static function all(){
             
             $files= File::files(public_path("posts/"));

             return array_map(function($file){
                  
                  return $file->getContents();

             },$files);

             // array map ak loop ki trah he is ki working h
             // yya ak new aray return krta h


}

	public static function findOrFail($slug){

           if(! file_exists($path= public_path("posts/{$slug}.html"))){
                   dd("file not exist");

            }

            //public_path is default method in laravel gives public folder 

          return cache()->remember("posts.{$slug}",5,fn()=> file_get_contents($path));

	}
}