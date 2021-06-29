<?php
namespace App\Models;
use Cache;

class Post{

    public static function find($slug){
        
        if(!file_exists($path = __DIR__."/../resources/posts/{$slug}.html")){
           return redirect("/");
        }

        return cache()->remember("posts.{$slug}", 40, function () {
            file_get_contents($path);
        });

    }
}


?>