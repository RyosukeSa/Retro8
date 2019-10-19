@extends('layouts.admin')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card" style="width: 30rem;">
                @foreach($posts as $post)
                    <img src="{{ asset('storage/image/' . $post->image_path) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="nickname">ニックネーム:{{ $post->nickname }}</h5>
                            <p class="card-text">自己紹介:{{ $post->intro }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">年齢:{{ $post->age }}</li>
                            <li class="list-group-item">夢中になったゲーム機:{{ $post->hard }}</li>
                            <li class="list-group-item">人生で最高のゲーム:{{ $post->best }}</li>
                        </ul>
                @endforeach
                <div class="card-body">
                    <a href="{{ action('Admin\ProfileController@edit', ['id' => $post->id]) }}" class="card-link">Profile修正</a>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="col-6">
                <h4>友人一覧</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="20%">ニックネーム</th>
                            <th width="70%">紹介文</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($friends as $friend)
                            <tr>
                                <th>{{ $friend->nickname }}</th>
                                <td>{{ \Str::limit($friend->intro, 50) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h4>友人の投稿一覧</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="20%">ニックネーム</th>
                            <th width="70%">紹介文</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($friends as $friend)
                            <tr>
                                <th>{{ $friend->nickname }}</th>
                                <td>{{ \Str::limit($friend->intro, 50) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>           
</div>
@endsection