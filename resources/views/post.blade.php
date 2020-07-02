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

                    <div>
                        @can('view', $post)
                        <div>id : {{$post->id}}</div>
                        <div>text : {{$post->text}}</div>
                        @else
                        <div>閲覧許可がありません。</div>
                        @endcan
                    </div>
                    <p>
                        <a href="/home">ホームへ</a>
                    </p>
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
