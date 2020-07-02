<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Responder\PostResponder;

class PostController extends Controller
{
    private $responder;

    public function __construct(PostResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if (Auth::check()) {
            $user_id = Auth::id();
            $text = $request->input('text');

            if (isset($text)) {
                $post = new Post;
                $post->user_id = $user_id;
                $post->text = $text;
                $post->save();
            }
        }

        $postList = DB::table('posts')
        ->orderBy('id', 'asc')
        ->get()->toArray();

        return view('home')->with("postList", $postList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
       
        $user = auth()->user();
        $authR_OK = $user->can('view', $post);

        if ($authR_OK) {
            return $this->responder->response($post);
        } else {
            return view('welcome')->with("post", $post); 
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Request $request)
    {
        //

        $user = auth()->user();
        $authR_OK = $user->can('update', $post);
        if ($authR_OK) {
            
            $text = $request->input('text');
            if (isset($text)) {
                $post->text = $text;
                $post->save();
            }
        } 

        $postList = DB::table('posts')
        ->orderBy('id', 'asc')
        ->get();

        return view('home')->with("postList", $postList);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
