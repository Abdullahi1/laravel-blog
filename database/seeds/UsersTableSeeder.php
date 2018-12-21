<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        $faker = Factory::create();


        //generate 3 user

        DB::table('users')->insert([
            [
                'name' => "John Doe",
                'email'=>"johndoe@test.com",
                'slug' => "john-doe",
                'bio' => $faker->text(rand(250, 300)),
                'password' => bcrypt('secret')
            ],

            [
                'name' => "Jane Doe",
                'email'=>"janedoe@test.com",
                'slug' => "jane-doe",
                'bio' => $faker->text(rand(250, 300)),
                'password' => bcrypt('secret')
            ],

            [
                'name' => "Yusuff Ahmed",
                'email'=>"ahmedolly@test.com",
                'slug' => "yusuff-ahmed",
                'bio' => $faker->text(rand(250, 300)),
                'password' => bcrypt('secret')
            ],
        ]);
    }
}
