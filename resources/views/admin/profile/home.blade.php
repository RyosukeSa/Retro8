@extends('layouts.admin')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card" style="width: 30rem;">
                
                    <img src="{{ asset('storage/image/' . $profile->image_path) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="nickname">ニックネーム:{{ $profile->nickname }}</h5>
                        <p class="card-text">自己紹介:{{ $profile->intro }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">年齢:{{ $profile->age }}</li>
                        <li class="list-group-item">夢中になったゲーム機:{{ $profile->hard }}</li>
                        <li class="list-group-item">人生で最高のゲーム:{{ $profile->best }}</li>
                    </ul>
                
                <div class="card-body">
                    <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}" class="card-link">Profile修正</a>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="col-6">
                <a href="{{ action('Admin\ProfileController@frindex') }}"><h4>ユーザー一覧へ</h4></a>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="20%">登録名</th>
                            <th width="70%">紹介文</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($friends as $friend)
                            <tr>
                                <th><a href="{{ action('Admin\ProfileController@ref', ['id' => $friend->id]) }}">{{ $friend->nickname }}</a></th>
                                <td>{{ \Str::limit($friend->intro, 50) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h4>最新の投稿一覧</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="20%">投稿者</th>
                            <th width="70%">ゲームタイトル</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <th>{{ $review->nickname  }}</th>
                                <td><a href="{{ action('Admin\ReviewController@check', ['id' => $review->id]) }}">{{ $review->title }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>           
</div>
@endsection