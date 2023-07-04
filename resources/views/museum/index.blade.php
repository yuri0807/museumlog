@extends('layouts.front')

@section('content')
<div class="container">
  <ul class="sort-btn">
    <li class="sort00 active" style="background-color: darkgray; color: white;"><a href="{{ route('museum.index') }}"><span class="text-decoration-none">全て</span></a></li>
    <li class="sort01" style="background-color: darkgray; color: white;"><a href="{{ route('museum.go_index') }}"><span class="text-decoration-none">行った</span></a></li>
    <li class="sort02" style="background-color: darkgray; color: white;"><a href="{{ route('museum.wanttogo_index') }}"><span class="text-decoration-none">行きたい</span></a></li>
    <li role="button" class="btn btn-light border-0" style="background-color: darkgray; color: white;"><a href="{{ route('admin.museum.add') }}"><span class="text-decoration-none">新規追加</span></a></li>
  </ul>
    <ul class="grid">
     
      @foreach($posts as $museum)
    <li class="item sort01">
      <div style="margin: 25px;">
        <div class="item-content" >
        <a href="{{ route('admin.museum.show', ['id' => $museum->id]) }}" > <img src="{{ secure_asset('storage/image/' . $museum->image_path) }}"></a>
        </div>
      </div>
    </li>
     @endforeach
  </ul>
</div>
@endsection