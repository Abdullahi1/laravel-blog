<?php
/**
 * Created by PhpStorm.
 * User: Abdullahi
 * Date: 12/21/2018
 * Time: 8:56 PM
 */

namespace App\View\Composers;


use App\Category;
use App\Post;
use App\Tag;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view){

        $this->composeCategories($view);

        $this->composePopularPosts($view);

        $this->composeTags($view);
    }

    private function composeCategories($view)
    {
        $categories  = Category::with(['post' => function($query){
            $query->published();
        }])
            ->orderBy('title','asc')
            ->get();
        return $view->with('categories',$categories);

    }

    private function composePopularPosts($view)
    {
        $popularPosts = Post::published()->popular()->take(3)->get();

        return $view->with('popularPosts',$popularPosts);
    }

    private function composeTags($view)
    {
        $tags = Tag::has('post')->get();

        return $view->with('tags',$tags);
    }
}