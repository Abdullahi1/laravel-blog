<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    //

//    protected $blog;
//
//    public function __construct(Post $post)
//    {
//        $this->blog = $post;
//    }

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


    //To use the model name as a argument the route name{i.e in web.php==> show ==> /blog/{post}}
    // must be the same as the function argument( show(Post $post) )
    public function show(Post $post){
//       $post = Post::published()
//        ->findOrFail($blog);

//        die($post);
//
    return view('blog.show',compact('post'));
//     //return view('blog.show')->with('post',$post);
    }
}
