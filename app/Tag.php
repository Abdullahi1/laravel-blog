<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function post(){
       return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'slug'; // TODO: Change the autogenerated stub
    }


}
