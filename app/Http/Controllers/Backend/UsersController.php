<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserDestroyRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::orderBy('name')->paginate(10);
        $userCount = User::count();
       return view('backend.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
        //$user = new User();
        return view('backend.users.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('backend/users')->with('message','User Created Successfully');

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
        $user = User::findOrFail($id);
        return view('backend.users.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        $data = $request->all();
        $user->update($data);
        return redirect('backend/users')->with('message','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDestroyRequest $request ,$id)
    {
        //
        $user = User::findOrFail($id);

        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;

        if ($deleteOption == "delete") {
            // delete user posts
           $posts = $user->post()->withTrashed();
//           foreach ($posts as $post){
//               $this->removeImage($post);
//           }
           $posts->forceDelete();
        }
        elseif ($deleteOption == "attribute") {
            $user->post()->update(['author_id' => $selectedUser]);
        }

        $user->delete();

        return redirect("backend/users")->with("message", "User was deleted successfully!");
    }

    public function confirm(UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $users = User::where('id', '!=', $user->id)->pluck('name', 'id');

        return view("backend.users.confirm", compact('user', 'users'));
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
