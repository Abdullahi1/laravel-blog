<?php

namespace App;

use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $dates = ['published_at'];

    public function getImageUrlAttribute($value){
        //$post->image_url
        $imageUrl ="";

        if (! is_null($this->image)){
            $imagePath = public_path()."/img/".$this->image;
            if (file_exists($imagePath)){
                $imageUrl = asset("img/".$this->image);
            }
        }

        return $imageUrl;
    }

    //A Post belongs to a specific user (Author)
    public function author(){
        return $this->belongsTo(User::class);
    }

    public function getDateAttribute($value)
    {
        //$post->date
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function getBodyContentAttribute($value){
      return  Markdown::convertToHtml(e($this->body));
    }

    //Creating A scope for the controller
    public function scopeLatestFirst($query){
        return $query->orderBy('created_at','desc');
    }

    public function scopePublished($query){
        return $query->where('published_at','<=',Carbon::now());
    }
}
