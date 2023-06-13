@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <ul class="sort-btn">
<li class="sort00 active">全て</li><!--はじめに「全て」ボタンに現在地表示をつけるためactive というクラス名を付与-->
<li class="sort01">行った</li>
<li class="sort02">行きたい</li>
</ul>
 <ul class="grid">
      @foreach($posts as $museum)
    <li class="item sort01">
    <div class="item-content">
        <th>{{ $museum->id }}</th>
    <a href="{{ route('admin.museum.show', ['id' => $museum->id]) }}" > <img src="{{ secure_asset('storage/image/' . $museum->image_path) }}"></a>
    </div>
    </li>
     @endforeach
  </ul>

        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ secure_asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ Str::limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ Str::limit($headline->body, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
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
                                <div class="title">
                                    {{ Str::limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ secure_asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection