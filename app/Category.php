<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    //A category can have more than one post
    public function post(){
        return $this->hasMany(Post::class);
    }
}
