@extends('layouts.admin')

@section('title', '全レビュー閲覧ページ')

@section('content')
    <div class="container">
        <div class="row">
            <h2>全レビュー一覧</h2>
        </div>
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="nickname">
                                    投稿者：{{ $post->nickname }} 
                                </div>
                                <div class="title">
                                    ゲームタイトル：{{ str_limit($post->title, 150) }}
                                </div>
                                <div class="value">
                                    評価：{{ str_limit($post->value, 5) }}
                                </div>
                                <div class="review mt-3">
                                    {{ str_limit($post->review, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
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