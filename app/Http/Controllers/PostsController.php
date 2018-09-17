<?php
/**
 * Created by PhpStorm.
 * User: yamauchiayaka
 * Date: 2018/09/10
 * Time: 18:12
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Post;
use App\User;
use App\models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


/**
 * Class PostsController
 * @package App\Http\Controllers
 */
class PostsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newPost()
    {
        $user = Auth::user();
        return view('new', ['user' => $user]);
    }

    /**
     * @param $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPost($post)
    {
        $posts = Post::find($post);
        $comments = Comment::all()->where('post_id', $post);
        $user = Auth::user();
        return view('single', ['posts' => $posts], ['comments' => $comments], ['user' => $user]);
    }

    /**
     * @param $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPost($post)
    {
        $posts = Post::find($post);

        $user = Auth::user();
        return view('edit', ['user' => $user], ['posts' => $posts]);
    }

    /**
     * @param $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePost($post)
    {
        Post::destroy($post);
        return redirect('home')->with('message', '記事が削除されました');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savePost(Request $request)
    {
        $user_id = Auth::user()->id;

        $data = [
            'title' => Input::get('title'),
            'content' => Input::get('content'),
        ];

        $request->validate([
            'title' => 'required|unique:posts,title,$user_id,author_id|max:255',
            'content' => 'required',
        ], [
            'title.required' => 'タイトルを入力してください',
            'title.unique' => '同じタイトルが存在しています',
            'content.required' => '本文を入力してください',
        ]);

        $post = new Post;
        $post->title = $data['title'];
        $post->author_id = $user_id;
        $post->read_more = substr($data['content'], 0, 120);
        $post->content = $data['content'];
        $post->save();

        return redirect('home')->with('message', '新しい記事を投稿しました');
    }

    /**
     * @param $post
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePost($post, Request $request)
    {
        $posts = Post::find($post);

        $data = [
            'title' => Input::get('title'),
            'content' => Input::get('content'),
        ];

        $request->validate([
            'title' => 'required|unique:posts,title,$posts->id,id|max:255',
            'content' => 'required',
        ], [
            'title.required' => 'タイトルを入力してください',
            'title.unique' => '同じタイトルが存在しています',
            'content.required' => '本文を入力してください',
        ]);

        $posts->title = $data['title'];
        $posts->read_more = substr($data['content'], 0, 120);
        $posts->content = $data['content'];
        $posts->save();

        return redirect('home')->with('message', '記事を編集しました');
    }

}
