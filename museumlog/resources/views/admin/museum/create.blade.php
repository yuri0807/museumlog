@extends('layouts.admin')
@section('title', 'ログの追加')

@section('content')
    <div class="container">
    <hr color="#c0c0c0">
        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <form action="{{ route('admin.museum.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2 text-dark" style="white-space: nowrap;">タイトル</label>
                    <div class="col-md-10">
                         <input type="text" class="form-control text-dark" name="title" value="{{ $museum_form->title ?? old('title') }}">
                    </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2 text-dark">メモ</label>
                    <div class="col-md-10">
                        <textarea class="form-control text-dark" name="body" rows="7">{{ old('body') }}</textarea>
                     </div>
                    </div>
                    
                    <div class="form-group row">
                         <label class="col-md-2 text-dark">画像</label>
                     <div class="col-md-10">
                         <input type="file" class="form-control-file text-dark" name="image">
                     </div>
                     </div>
                     
                    <div class="form-group row">
                         <label class="col-md-2 text-dark">分類</label>
                    <div class="col-md-10">
                    <div class="form-check">
                         <input class="form-check-input" type="radio" name="go" id="flexRadioDefault1" value="1" {{ old('go')  == 1 ? "checked" : "" }}/>
                         <label class="form-check-label text-dark" for="flexRadioDefault1">
                         行きたい
                         </label>
                     </div>
                     <div class="form-check">
                         <input class="form-check-input" type="radio" name="go" id="flexRadioDefault2" value="2" {{ old('go')  == 2 ? "checked" : "" }}/>
                         <label class="form-check-label text-dark" for="flexRadioDefault2">
                         行った
                          </label>
                    </div>
                    </div>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                    <div class="btn-group">
                         <a href="{{ route('museum.index') }}" class="btn btn-light" style="background-color: white; color: gray; margin-right: 10px; width: 100px;">
                         <span style="white-space: nowrap;">もどる</span>
                         </a>
                    </div>
                    
                    <div class="btn-group">
                    <div class="col-md-10 text-center">
                         <form action="{{ route('museum.index') }}" method="POST">
                    @csrf
                         <input type="submit" class="btn btn-light" value="追加" style="background-color: white; color: gray; width: 100px;">
                    </form>
                    </div>
                    </div>
    </div>
    </div>
@endsection