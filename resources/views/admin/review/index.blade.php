@extends('layouts.admin')
@section('title', 'Review List')

@section('content')
    <div class="container">
        <div class="row">
            <h2>レビューリスト</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
            
            </div>
        </div>
        <div class="row">
            <div class="list-review col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">投稿番号</th>
                                <th width="20%">ゲームタイトル</th>
                                <th width="10%">評価</th>
                                <th width="40%">レビュー</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $rev)
                                <tr>
                                    <th>{{ $rev->id }}</th>
                                    <td>{{ str_limit($rev->title, 100) }}</td>
                                    <td>{{ $rev->value }}</td>
                                    <td>{{ str_limit($rev->review, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\ReviewController@edit', ['id' => $rev->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\ReviewController@delete', ['id' => $rev->id]) }}">削除</a>
                                        </div>
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