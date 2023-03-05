<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::factory(200)->create();
        Post::inRandomOrder()->limit(30)->delete();

//        for ($i = 0; $i < 20; $i++) {
//            $p = new Post();
//            $p->title = 'my title'.$i;
//            $p->slug = 'my-title'.$i;
//            $p->body = 'body'.$i;
//            $p->save();
//        }
    }
}
