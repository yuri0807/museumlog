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
    <a href="{{ route('admin.museum.show', ['id' => $museum->id]) }}" > <img src="{{ secure_asset('storage/image/' . $museum->image_path) }}"></a>
    </div>
    </li>
     @endforeach
  </ul>
            </div>
        </div>
    </div>
    </div>
@endsection