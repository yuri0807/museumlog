@extends('layouts.admin')
@section('title', '詳細')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('admin.museum.show') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                            <div class="form-text text-info">
                                <img src="{{ secure_asset('storage/image/' . $museum->image_path) }}"></a>
                            </div>
                         
                            <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $museum->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $museum->body }}</textarea>
                        </div>
                    </div>
                            
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $museum->id }}">
                            @csrf
                            <a href="{{ route('admin.museum.index', ['id' => $museum->id]) }}">もどる</a>
                             <a href="{{ route('admin.museum.edit', ['id' => $museum->id]) }}">編集</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection