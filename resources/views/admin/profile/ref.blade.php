@extends('layouts.admin')

@section('title', 'ユーザー閲覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card" style="width: 30rem;">
                   <h3>Now, You visit in {{ $profile->nickname }}'s room !</h3>
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
           </div>
        </div>
        <div class="col-7">
            <div class="col-6">
                <h4>ユーザー一覧</h4>
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
                                <th><a href="{{ action('Admin\ReviewController@ref', ['id' => $friend->id]) }}">{{ $friend->nickname }}</a></th>
                                <td>{{ \Str::limit($friend->intro, 50) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h4><a href="{{ action('Admin\ReviewController@ref', ['id' => $profile->id]) }}">{{ $profile->nickname }}の投稿一覧</a></h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            
                            <th width="70%">ゲームタイトル</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                
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