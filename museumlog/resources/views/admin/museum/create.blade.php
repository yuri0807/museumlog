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
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">メモ</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="7">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="form-group row">
                        <label class="col-md-2">分類</label>
                        <div class="col-md-10">
                             <div class="form-check">
                       <input class="form-check-input" type="radio" name="go" id="flexRadioDefault1" value="1" {{ old('go')  == 1 ? "checked" : "" }}/>
                        <label class="form-check-label" for="flexRadioDefault1">
                        行きたい
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="go" id="flexRadioDefault2" value="2" {{ old('go')  == 2 ? "checked" : "" }}/>
                        <label class="form-check-label" for="flexRadioDefault2">
                        行った
                        </label>
                        </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
  <div class="col-md-10 text-center">

    @csrf
    <input type="submit" class="btn btn-light" value="追加" style="background-color: white; color: gray;">
  </div>
</div>
                </form>
            </div>
        </div>
    </div>
@endsection