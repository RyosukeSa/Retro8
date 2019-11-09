@extends('layouts.admin')

@section('title', 'ユーザー一覧ページ')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ユーザー一覧</h2>
        </div>
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="nickname">
                                    登録id：{{ $post->user_id }}
                                </div>
                                <div class="nickname">
                                    ニックネーム：<a href="{{ action('Admin\ProfileController@ref', ['id' => $post->id]) }}">{{ $post->nickname }}</a>
                                </div>
                                <div class="review mt-3">
                                    紹介文：{{ str_limit($post->intro, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}" width="300" height="200">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection