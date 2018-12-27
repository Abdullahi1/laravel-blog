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

    public function index()
    {
        //
//        $posts = Post::with('author', 'category')->latest()->paginate(10);
        $posts = Post::with('author', 'category')->latest()->where('author_id',Auth::id())->paginate(10);
        return view('backend.blog.index',compact('posts'));
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
        $data = $this->handleRequest($request);
        $post->update($data);

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
    }
}