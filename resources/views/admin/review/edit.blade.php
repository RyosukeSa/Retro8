@extends('layouts.admin')

@section('title', 'Reviewの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Reviewの編集ページ</h2>
                <form action="{{ action('Admin\ReviewController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">ゲームタイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $review_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="value">評価</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="value" value="{{ $review_form->value }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="review">レビュー</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $review_form->review }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <div class="form-test test-info">
                                設定中: {{ $review_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $review_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection