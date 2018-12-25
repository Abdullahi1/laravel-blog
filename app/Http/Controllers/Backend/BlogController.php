<?php

namespace App\Http\Controllers\Backend;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Requests;

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
        $posts = Post::with('category', 'author')->latest()->paginate(8);
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
    public function edit(Post $blog)
    {
        //
        //$post = Post::with('category', 'author')->where('id','=',$id)->get();
        dd($blog->id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
