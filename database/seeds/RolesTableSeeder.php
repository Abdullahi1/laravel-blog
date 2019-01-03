<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('roles')->truncate();
        //
        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Admin';
        $admin->save();


        $editor = new Role();
        $editor->name = 'editor';
        $editor->display_name = 'Editor';
        $editor->save();

        $author = new Role();
        $author->name = 'author';
        $author->display_name = 'Author';
        $author->save();


        //Attach roles to the user
        $user1 = User::find(1);
        $user1->detachRole($admin);
        $user1->attachRole($admin);

        $user2 = User::find(2);
        $user2->detachRole($editor);
        $user2->attachRole($editor);

        $user3 = User::find(3);
        $user3->detachRole($editor);
        $user3->attachRole($editor);

        $user4 = User::find(4);
        $user4->detachRole($author);
        $user4->attachRole($author);

        $user5 = User::find(5);
        $user5->detachRole($author);
        $user5->attachRole($author);

    }
}
