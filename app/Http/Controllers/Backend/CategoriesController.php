<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Requests\CategoryDeleteRequest;
use App\Http\Requests\CategoryRequest;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('title')->paginate(10);
        $categoryCount = Category::count();
        return view('backend.categories.index',compact('categories','categoryCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        //
        return view('backend.categories.create',compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $data = $request ->all();
        Category::create($data);
        return redirect('backend/categories')->with('message','Categories Created Successfully');

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('backend.categories.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //

//        Category::findOrFail($id)->update($request->all());

        $category = Category::findOrFail($id);
        $data = $request->all();
        $category->update($data);

        return redirect('backend/categories')->with('message','Category Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDeleteRequest $request, $id)
    {
        //
        //Note:
        /**
         * Posts Related to the deleted Categories Would be moved to uncategorized categories
        **/
        Post::withTrashed()->where('category_id',$id)->update(['category_id' => config('cms.default_category_id') ]);
        Category::findOrFail($id)->delete();

        return redirect()->back()->with('trash-message','Category deleted successfully');

    }
}
