<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $posts = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.author_id')
            ->orderBy('posts.id', 'desc')
            ->paginate(15);

        return view('home', ['posts' => $posts], ['user' => $user]);
    }

    /**
     * @param $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users($post)
    {
        $user = Auth::user();
        $user_posts = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.author_id')
            ->where('posts.id', '=', $post)
            ->get();

        foreach ($user_posts as $pos) {
            $posts = DB::table('users')
                ->join('posts', 'users.id', '=', 'posts.author_id')
                ->where('posts.author_id', '=', $pos->author_id)
                ->orderBy('posts.id', 'desc')
                ->get();
        }

        return view('users', ['user' => $user], ['posts' => $posts]);
    }
}
