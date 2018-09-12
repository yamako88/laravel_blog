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


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
//        dd($posts->toArray());
//        return View::make('index')->with('posts', $posts);
        return view('index')->with('posts', $posts);
    }

    public function show($id)
    {
        $post = Post::find($id);
//        return View::make('single')->with('post', $post);
        return view('single')->with('post', $post);
    }

    public function create()
    {
        $post = Post::all();
        return view('create')->with('post', $post);
    }

}