<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Events\PersonEvent;
use App\Events\PublishProcessor;
use Illuminate\Support\Facades\Event;

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
        $user = Auth::user();
        event(new PublishProcessor($user->id));

        $postList = DB::table('posts')
            ->orderBy('id', 'asc')
            ->get()->toArray();
            
        return view('home')->with("postList", $postList);
    }
}
