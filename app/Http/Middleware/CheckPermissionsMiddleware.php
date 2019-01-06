<?php

namespace App\Http\Middleware;

use App\Post;
use Closure;

class CheckPermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Get Current User
        $currentUser = $request->user();

        //Get The Controller
        $currentAction = $request->route()->getActionName(); //Get the current Controller with the called method

        list($currentController, $currentMethod) = explode('@',$currentAction);

        $currentController = str_replace(['App\\Http\\Controllers\\Backend\\','Controller'],'',$currentController);

        $crudPermissionsMap = [
            'crud' => ['index','create','store','edit','update','delete','restore','forceDestroy']
        ];

        $classesMap = [
            'Blog' => 'post',
            'Categories' => 'category',
            'Users' => 'user',
        ];

        foreach ($crudPermissionsMap as $permission => $methods){
            if (in_array($currentMethod,$methods) && isset($classesMap[$currentController])){

                $className = $classesMap[$currentController];
//                dd("{$permission}-{$className}");
                if ($className == 'post' && in_array($currentMethod,['edit','update','destroy','restore','forceDestroy'])){

                    if ($id = $request->route('blog') && (!($currentUser ->can('update-others-post') || $currentUser ->can('delete-others-post')))){
                        $post  = Post::findOrFail($id);
                        if ($post->author_id != $currentUser->id){
                            abort(403,'Forbidden');
                        }
                    }
                }
                elseif (! ($currentUser ->can("{$permission}-{$className}"))){
                    abort(403,'Forbidden');
                }
                break;
            }
        }
        //dd($currentController);

        return $next($request);
    }
}
