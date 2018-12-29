<?php

namespace App\Http\Controllers\Backend;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BlogController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path('img');
    }

    public function index(Request $request)
    {
        //
        if (($status = $request->get('status')) && $status == 'trash'){
            //Use withTrashed or onlyTrashed
            $posts = Post::onlyTrashed()
                ->with('author', 'category')
                ->latest()
                ->where('author_id',Auth::id())
                ->paginate(10);
            $postCount = Post::count();
            $onlyTrashed = TRUE;

        }elseif($status == 'published'){
            //Calling the published Scope
            $posts = Post::published()
                ->with('author', 'category')
                ->latest()
                ->where('author_id',Auth::id())
                ->paginate(10);
            $postCount = Post::count();
            $onlyTrashed = FALSE;

        }elseif($status == 'scheduled'){
            $posts = Post::scheduled()
                ->with('author', 'category')
                ->latest()
                ->where('author_id',Auth::id())
                ->paginate(10);
            $postCount = Post::count();
            $onlyTrashed = FALSE;

        }elseif($status == 'draft'){
            $posts = Post::draft()
                ->with('author', 'category')
                ->latest()
                ->where('author_id',Auth::id())
                ->paginate(10);
            $postCount = Post::count();
            $onlyTrashed = FALSE;

        }else {
            $posts = Post::with('author', 'category')
                ->latest()->where('author_id',Auth::id())
                ->paginate(10);
            $postCount = Post::count();
            $onlyTrashed = FALSE;
        }

//        $posts = Post::with('author', 'category')->latest()->paginate(10);

        $statusList = $this->statusListCount();

        return view('backend.blog.index',compact('posts','postCount','onlyTrashed','statusList'));
    }

    //Returns the number of post for each sections
    protected function statusListCount()
    {
        return [
          'all' => Post::where('author_id',Auth::id())->count(),
            'published' => Post::where('author_id',Auth::id())->published()->count(),
            'scheduled' => Post::where('author_id',Auth::id())->scheduled()->count(),
            'draft' => Post::where('author_id',Auth::id())->draft()->count(),
            'trash' => Post::where('author_id',Auth::id())->onlyTrashed()->count(),
        ];
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        //
        //dd('hello');

        return view('backend.blog.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {
        //

        $data = $this->handleRequest($request);
        $request->user()->post()->create($data);

        return redirect('backend/blog')->with('message','Post Created Successfully');
    }


    public function handleRequest(Request $request){
        $data = $request->all();

        if ($request->hasFile('image')){
            $image = $request ->file('image'); //File Method return a file object
            $fileName = $image->getClientOriginalName(); //File Name to be saved to the post table
            $destination = $this->uploadPath;
            $image->move($destination,$fileName);

            $data['image'] = $fileName;
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $blog
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    //Post $blog
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('backend.blog.edit',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostRequest $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $oldImage = $post->image;
        $data = $this->handleRequest($request);
        $post->update($data);
        if ($oldImage != $post->image){
            $this->removeImage($oldImage);
        }

        return redirect('backend/blog')->with('message','Post Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::findOrFail($id)->delete();

        //return redirect('backend/blog')->with('trash-message',['Post moved to trash',$id]);

        return redirect()->back()->with('trash-message',['Post moved to trash',$id]);
    }

    protected function forceDestroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $postImage = $post->image;
        $post->forceDelete();
        $this->removeImage($postImage);
        return redirect('backend/blog?status=trash')->with('message','Post Deleted Successfully');
    }

    public function restore($id){
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        //return redirect('backend/blog')->with('message','Post Restored From the trash Successfully');

        return redirect()->back()->with('message','Post Restored From the trash Successfully');
    }

    public function removeImage($image){
        if (empty($image)){
            $imagePath = $this->uploadPath. '/'. $image;

            if (file_exists($imagePath)){
                unlink($imagePath);
            }
        }
    }
}
