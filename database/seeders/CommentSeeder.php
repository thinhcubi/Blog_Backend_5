<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment();
        $comment->content = "Tuyệt vời";
        $comment->user_id = "2";
        $comment->post_id = "25";
        $comment->like = "2";
        $comment->save();

        $comment = new Comment();
        $comment->content = "Hay quá";
        $comment->user_id = "2";
        $comment->post_id = "26";
        $comment->like = "2";
        $comment->save();

        $comment = new Comment();
        $comment->content = "Tuyệt vời";
        $comment->user_id = "5";
        $comment->post_id = "26";
        $comment->like = "3";
        $comment->save();


    }
}
