@extends('layouts.admin')

@section('title', 'Reviewの新規作成')

@section('content')
    <div class="container">
         <div class="row">
             <div class="col-md-8 mx-auto">
                <h2>Reviewの新規作成</h2>
                <form action="{{ action('Admin\ReviewController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3" for="title">ゲームタイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="value">評価 (駄作1 〜 5良作)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="value" value="{{ old('value') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="review">レビュー</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="review" rows="20">{{ old('review') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                    　  <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
 