<?php

namespace App\Http\Controllers;


use App\Category;
use App\User;
use function foo\func;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

    public function index(){

        //This gets all post and order it by latest created
        //There are two methods
        //1. orderBy(columnName, sortOrder)
        //2.latest()
        $posts = Post::with('author')
            ->latest()
            ->published()
            ->paginate(3);


        return view('blog.index',compact('posts'));
//        return view('blog.index')->with(array('posts','categories'),array($posts, $categories));

    }


    //To use the model name as a argument the route name{i.e in web.php==> show ==> /blog/{post}}
    // must be the same as the function argument( show(Post $post) )
    public function show(Post $post){

        //Update Post to increment the post on each time a unique user open a post
        //1. Option One
//        $viewCount = $post -> view_count + 1;
//        $post -> update('view_count',$viewCount);

        //Option Two
        $post->increment('view_count',1);


    return view('blog.show',compact('post'));
    }

    public function category(Category $category){

        $categoryName = $category -> title;

        $posts = $category
            ->post()
            ->with('author')
            ->latestFirst()
            ->published()
            ->paginate(3);


        return view('blog.index',compact('posts','categoryName'));
    }

    public function author(User $author){
       // die($author->name);

        $authorName = $author -> name;


        $posts = $author
            ->post()
            ->with('category')
            ->latest()
            ->published()
            ->paginate(3);


        return view('blog.index',compact('posts','authorName'));    }
}
