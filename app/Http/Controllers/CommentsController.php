<?php
/**
 * Created by PhpStorm.
 * User: yamauchiayaka
 * Date: 2018/09/18
 * Time: 13:56
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
 * Class CommentsController
 * @package App\Http\Controllers
 */
class CommentsController extends Controller
{
    /**
     * @param $post
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveComment($post, Request $request)
    {
        $user = Auth::user();

        $data = [
            'comment' => Input::get('comment'),
        ];

        $request->validate([
            'comment' => 'required|max:255',
        ], [
            'comment.required' => 'コメントを入力してください',
            'comment.max' => '255字以内で書いてください',
        ]);

        $comment = new Comment;
        $comment->commenter = $user->username;
        $comment->post_id = $post;
        $comment->email = $user->email;
        $comment->comment = $data['comment'];
        $comment->save();

        return redirect()->route('post.show', ['post' => $post]);
    }

}
