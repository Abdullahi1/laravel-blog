<?php

namespace App;

use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
//This method is needed to be included if there is update in the post table using the "Update" Method
//
//    protected $fillable = ['view_count'];

use SoftDeletes;

        protected $fillable = ['title','slug','excerpt','body','category_id','published_at','image'];

    protected $dates = ['published_at'];

    //Defining the published_at mutator to store a value to the db
    public function setPublishedAtAttribute($value){
        $this->attributes['published_at'] = $value ?: NULL;
    }

    //Defining the image_url attribute
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

    //A Post can belong to a specific Categories
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Attributes

    public function getDateAttribute($value)
    {
        //$post->date
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function getBodyContentAttribute($value){
      return  Markdown::convertToHtml(e($this->body));
    }


    public function dateFormatted($showTimes = false){
        $format = "d/m/Y";
        if ($showTimes){
            $format = $format ." H:i:s";
        }


        return $this->created_at->format($format);
    }



    public function publicationLabel(){
        if (! $this->published_at){
            return '<span class="label label-warning">Draft</span>';
        }elseif ($this -> published_at && $this->published_at->isFuture()){
            return '<span class="label label-info">Schedule</span>';
        }else{
            return '<span class="label label-success">Published</span>';
        }
    }


    //Creating A scope for the controller
    public function scopeLatestFirst($query){
        return $query->orderBy('created_at','desc');
    }

    public function scopePublished($query){
        return $query->where('published_at','<=',Carbon::now());
    }

    public function scopeScheduled($query){
        return $query->where('published_at','>',Carbon::now());
    }

    public function scopeDraft($query){
        //return $query->where('published_at','=',null);
        return $query->whereNull('published_at');
    }


    public function scopePopular($query){
        return $query->orderBy('view_count','asc');
    }
}
