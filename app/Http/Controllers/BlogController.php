<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    //

    public function index(){

        //This gets all post and order it by latest created
        //There are two methods
        //1. orderBy(columnName, sortOrder)
        //2.latest()
        $posts = Post::with('author')
            ->latest()
            ->published()
            ->paginate(3);
        //return view('blog.index',compact('posts'));
        return view('blog.index')->with('posts',$posts);

    }

    public function show($id){
        $post = Post::findOrFail($id);

     return view('blog.show')->with('post',$post);
    }
}
