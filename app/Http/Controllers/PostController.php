<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class PostController extends Controller
{
    public function index(){

        $post = Post::all();
        return response()->json($post,201);
    }
    public function store(StoreRequest $request){

        DB::beginTransaction();

        try {

            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content_post;
            $post->image = $request->image;
            $post->desc = $request->desc;
            $post->access_modifier= $request->access_modifier;
            $post->user_id = $request->user_id;
            $post->category_id = $request->category_id;
            $post->save();
            return response()->json('Đã thêm thành công bài post' );

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

    }
    public function destroy($id)
    {

        $song = Post::findOrFail($id);
        $song->delete();
        $songs = Post::all();
        return response()->json($songs);
    }

    public function update (Request $request){

        DB::beginTransaction();

        try {

            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content_post;
            $post->image = $request->image;
            $post->desc = $request->desc;
            $post->access_modifier= $request->access_modifier;
            $post->user_id = $request->user_id;
            $post->category_id = $request->category_id;
            $post->save();
            return response()->json('Đã update thành công bài post' );

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function findPost(Request $request)
    {
        $key = $request->title;
        $posts = Post::where('title',"like",'%'.$key.'%')->get();
        return response()->json($posts);
    }
    public function showPublic(Request $request)
    {
        $pageSize = $request->pageSize;
        $post = Post::where('access_modifier', 0 )->with('user')->orderBy('id')->paginate($pageSize);
        return response()->json($post);
    }
    public function showPublicWithAuthor($id)
    {
        $posts = Post::where('user_id', '=', $id)->where('access_modifier', 0)->with('user')->with('category')->get();
        return response()->json($posts);
    }

    public function showDetailPost(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $user = User::where('id',$post->user_id)->get();
        $data = [
          'post' => $post,
          'user' => $user,
        ];
        return response()->json($data);
    }
    public function showPostRecent(Request $request)
    {
        $post = Post::orderBy('id', 'desc')->where('access_modifier', 0)->with('user')->limit(1)->get();
        return response()->json($post);
    }

    public function getComment(Request $request)
    {
        $user_comment = DB::table('posts')->join('comments','comments.post_id','=','posts.id')->join('users','users.id','=','comments.user_id')->where('posts.id','=',$request->id)->get();
        return response()->json($user_comment);
    }
    public function createComment(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $comment = new Comment();
        $comment->content = $request->_content;
        $comment->user_id = $user->id;
        $comment->post_id = $request->post_id;
        $comment->save();
        return response()->json($comment);
    }

}

