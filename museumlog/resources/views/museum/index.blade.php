@extends('layouts.front')

@section('content')
    <div class="container">
        <ul class="sort-btn">
<li class="sort00 active" style="background-color: darkgray; color: white;"><a href="{{ route('museum.index') }}">全て</a></li><!--はじめに「全て」ボタンに現在地表示をつけるためactive というクラス名を付与-->
<li class="sort01" style="background-color: darkgray; color: white;"><a href="{{ route('museum.go_index') }}">行った</a></li>
<li class="sort02" style="background-color: darkgray; color: white;"><a href="{{ route('museum.wanttogo_index') }}">行きたい</a></li>
            <div class="col-md-4">
           <a href="{{ route('admin.museum.add') }}" role="button" class="btn btn-light" style="background-color: darkgray; color: white;">新規追加</a>
            </div>
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