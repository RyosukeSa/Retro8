@extends('layouts.admin')

@section('title', 'コメントページ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card" style="width: 30rem;">
                <img src="{{ asset('storage/image/' . $review->image_path) }}" class="card-img-top">
                <div class="card-body">
                    <h2 class="nickname">{{ $review->title }}</h2>
                    <p></p>
                    <p class="card-text">レビュー:{{ $review->review }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">投稿者:{{ $review->nickname }}</li>
                    <li class="list-group-item">投稿者の評価:{{ $review->value }}</li>
                </ul>
            </div>
            <div class="comment">
                <h2>このレビューにコメント</h2>
                <form action="{{ action('Admin\ReviewController@comment') }}" method="post" enctype="multipart/form-data">
                    <textarea class="form-control" name="comment" rows="5"></textarea>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="コメント">
                </form>
            </div>
        </div>
        <div class="col-7">
            
        </div>
    </div>
</div>







@endsection