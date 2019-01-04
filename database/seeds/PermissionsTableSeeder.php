<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('permissions')->truncate();

        //
        $crudPost = new Permission();
        $crudPost->name = "crud-post";
        $crudPost->save();

        $updateOthersPost = new Permission();
        $updateOthersPost->name = "update-others-post";
        $updateOthersPost->save();

        $deleteOthersPost = new Permission();
        $deleteOthersPost->name = "delete-others-post";
        $deleteOthersPost->save();

        $crudCategory = new Permission();
        $crudCategory->name = "crud-category";
        $crudCategory->save();

        $crudUser = new Permission();
        $crudUser->name = "crud-user";
        $crudUser->save();

        $admin = Role::find(1);
        $editor = Role::find(2);
        $author = Role::find(3);

//        $admin->detachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser]);
//        $admin->attachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser]);

        $admin->permissions()->detach([$crudPost->id, $updateOthersPost->id, $deleteOthersPost->id, $crudCategory->id, $crudUser->id]);
        $admin->permissions()->attach([$crudPost->id, $updateOthersPost->id, $deleteOthersPost->id, $crudCategory->id, $crudUser->id]);

//        foreach ($editors as $editor) {
//            $editor->detachPermission([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);
//            $editor->attachPermission([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);
//        }

//        $editor->detachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);
//        $editor->attachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);

        $editor->permissions()->detach([$crudPost->id, $updateOthersPost->id, $deleteOthersPost->id, $crudCategory->id]);
        $editor->permissions()->attach([$crudPost->id, $updateOthersPost->id, $deleteOthersPost->id, $crudCategory->id]);


//        foreach ($authors as $author) {
//            $author->detachPermission([$crudPost]);
//            $author->attachPermission([$crudPost]);
//        }

//        $author->detachPermission([$crudPost]);
//        $author->attachPermission([$crudPost]);

        $author->permissions()->detach([$crudPost->id]);
        $author->permissions()->attach([$crudPost->id]);


    }
}
