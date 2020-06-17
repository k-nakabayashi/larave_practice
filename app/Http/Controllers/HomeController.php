<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $postList = Post::all()->orderBy('id', 'asc')->toArray();
        $postList = DB::table('posts')
            ->orderBy('id', 'asc')
            ->get()->toArray();
        return view('home')->with("postList", $postList);
    }
}
