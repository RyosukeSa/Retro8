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
                    <li class="list-group-item">投稿者の評価:{{ $review->value }} (駄1〜5良)</li>
                </ul>
            </div>
            <div class="comment">
                <h2>このレビューにコメント</h2>
                <form action="{{ action('Admin\ReviewController@comment') }}" method="post" enctype="multipart/form-data">
                    
                    <label class="col-md-3" for="value">コメント</label>
                    <input name="id" type="hidden" value="{{ $review->id }}">
                    <textarea class="form-control" name="comment" rows="5"></textarea>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="コメント">
                </form>
            </div>
        </div>
        <div class="col-7">
            <div class="col-6">
            <h4>コメント一覧</h4>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th width="20%">登録名</th>
                        <th width="70%">コメント</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <th>{{ $comment->nickname }}</th>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                @if ($user_id == $comment->user_id)
                                    <a href="{{ action('Admin\ReviewController@comdelete', ['id' => $comment->id]) }}">削除</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>







@endsection