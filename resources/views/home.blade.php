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
                        <li class="col-4">
                        @if (Auth::id() === $post->user_id) 
                            <input class="js-postID" type="radio" name="postId" value="{{$post->id}}" onclick='checkPost("{{$post->id}}")'>
                            <p>id : {{ $post->id }} || user_id :  {{ $post->user_id }}</p>
                            <p>text : {{ $post->text }}</p>
                        @else 
                            <input class="js-postID" type="radio" name="postId" value="{{$post->id}}" onclick='checkPost("{{$post->id}}")'>
                            <p>id : {{ $post->id }} || user_id :  {{ $post->user_id }}</p>
                            <p>text : {{ $post->text }}</p>
                        @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
           
                <div class="container pb-3">
                    <div class="row">
                        <form class="col" action="/post/create" method="GET">
                            <p>新規投稿</p>
                            <p><input type="text" name="text"></p>
                            <button>送信</button>
                        </form>
                        <form class="col editForm" action="" method="GET">
                            <p>投稿編集 : id : <span class="ediPostId">未選択</span></p>
                            <p><input type="nume" name="text"></p>
                            <button>送信</button>
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
