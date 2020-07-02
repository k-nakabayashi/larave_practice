@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                
                <div class="container">
                    <ul class="row">
                        @foreach ($postList as $post)
                        <li class="col-4" style="list-style: none;">
                            <div class="container">
                                <div class="row">
                
                                    @if (Auth::id() === $post->user_id) 
                                    <p class="col-1">
                                        <input class="js-postID pt-3" type="radio" name="postId" onclick='checkPost("{{$post->id}}")'>
                                    </p>
                                    <form class="col-1" action="{{ route('post.show', ['post' => $post->id])}}" methdo="GET">
                                        <button class="btn">詳細を見る</button>
                                    </form>
                                    @endif
                                    <div class="col-12">
                                        <p class="mb-0">id : {{ $post->id }}</p>
                                        <p>text : {{ $post->text }}</p>
                                    </div> 
                                </div>
                            </div>

                        </li>
                        @endforeach
                    </ul>
                </div>
           
                <div class="container pb-3">
                    <div class="row">
                        <form class="col" action="/post/create" method="GET">
                            @csrf
                            <p>新規投稿</p>
                            <p><input type="text" name="text"></p>
                            <button class="btn">送信</button>
                        </form>
                        <form class="col editForm" action="/home" method="GET">
                            @csrf
                            <p>投稿編集 : id : <span class="ediPostId">未選択</span></p>
                            <p><input type="nume" name="text"></p>
                            <button  class="btn">送信</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

function checkPost($postId) {
  $('.editForm').attr('action', "/post/" + $postId + "/edit");
  $('.ediPostId').text($postId);
}
</script>
@endsection
