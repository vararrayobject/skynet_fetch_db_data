<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = $res->json();
        foreach ($posts as $post) {
            // $newPost = new Post();
            Post::updateOrCreate(
                ['user_id' => $post['userId'], 'title' => $post['title']],
                ['body' => $post['body']]
            );
            // $post
        }
    }
}
