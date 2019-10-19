@extends('layouts.admin')

@section('title', 'Profileの編集')

@section('content')
    <div class="container">
         <div class="row">
             <div class="col-md-8 mx-auto">
                <h2>Profileの編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3" for="age">年齢</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="age" value="{{ $profile_form->age }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="hard">夢中になったゲーム機</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hard" value="{{ $profile_form->hard }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="best">人生で最高の一作</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="best" value="{{ $profile_form->best }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="intro">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="intro" rows="20">{{ $profile_form->intro }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                    　  <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-test test-info">
                                設定中: {{ $profile_form->image_path }}
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
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection