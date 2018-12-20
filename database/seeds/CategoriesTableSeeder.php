<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
           [
               'title' => 'Web Design',
               'slug' => 'web-design'
           ],[
                'title' => 'Web Programming',
                'slug' => 'web-programming'
            ],[
                'title' => 'Internet',
                'slug' => 'internet'
            ],[
                'title' => 'Social Marketing',
                'slug' => 'social-marketing'
            ],[
                'title' => 'Photography',
                'slug' => 'photography'
            ],[
                'title' => 'Lifestyle',
                'slug' => 'lifestyle'
            ]
        ]);

    }
}
