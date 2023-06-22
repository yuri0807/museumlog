@extends('layouts.admin')
@section('title', 'ログの編集')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="col-md-8 mx-auto">
              
                <form action="{{ route('admin.museum.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $museum_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">メモ</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="7">{{ $museum_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $museum_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                            <div class="form-group row">
                          <label class="col-md-2">分類</label>
                        <div class="col-md-10">
                             <div class="form-check">
                        <input class="form-check-input" type="radio" name="go" id="flexRadioDefault1" value="1" {{ $museum_form->go == 1 ? "checked" : "" }}/>
                        <label class="form-check-label" for="flexRadioDefault1">
                        行きたい
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="go" id="flexRadioDefault2" value="2" {{ $museum_form->go == 2 ? "checked" : "" }}/>
                        <label class="form-check-label" for="flexRadioDefault2">
                        行った
                        </label>
                        </div>      
                        </div>
                    </div>
                  <div class="form-group row">
  <div class="col-md-10 text-center">
    <input type="hidden" name="id" value="{{ $museum_form->id }}">
    @csrf
    <input type="submit" class="btn btn-light" value="更新" style="background-color: white; color: gray;">
  </div>
</div>
                </form>
            </div>
        </div>
    </div>
@endsection