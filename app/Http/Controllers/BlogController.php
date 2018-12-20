<?php

namespace App\Http\Controllers;


use App\Category;
use function foo\func;
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

//        $categories  = Category::with(['post' => function($query){
//            $query->published();
//        }])
//            ->orderBy('title','asc')
//            ->get();


        return view('blog.index',compact('posts'));
//        return view('blog.index')->with(array('posts','categories'),array($posts, $categories));

    }


    //To use the model name as a argument the route name{i.e in web.php==> show ==> /blog/{post}}
    // must be the same as the function argument( show(Post $post) )
    public function show(Post $post){
//       $post = Post::published()
//        ->findOrFail($blog);

//        die($post);

//        $categories  = Category::with(['post' => function($query){
//            $query->published();
//        }])
//            ->orderBy('title','asc')
//            ->get();
//
    return view('blog.show',compact('post'));
//     //return view('blog.show')->with('post',$post);
    }

    public function category(Category $category){

        $categoryName = $category -> title;

        $posts = $category
            ->post()
            ->with('author')
            ->latestFirst()
            ->published()
            ->paginate(3);



//        $categories  = Category::with(['post' => function($query){
//            $query->published();
//        }])
//            ->orderBy('title','asc')
//            ->get();


        return view('blog.index',compact('posts','categoryName'));
    }
}
