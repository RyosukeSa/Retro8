@extends('layouts.admin')

@section('title', 'Profileの新規作成')

@section('content')
    <div class="container">
         <div class="row">
             <div class="col-md-8 mx-auto">
                <h2>Profileの新規作成</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3" for="title">登録名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="value">年齢</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="age" value="{{ old('age') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="value">夢中になったゲーム機</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hard" value="{{ old('hard') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="value">人生で最高の一作</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="best" value="{{ old('best') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="review">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="intro" rows="20">{{ old('intro') }}</textarea>
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