@extends('layouts.admin')
@section('title', '詳細')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
                <form action="{{ route('admin.museum.show') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                   <div class="d-flex justify-content-center">
                   <div class="mb-3">
                        <img src="{{ secure_asset('storage/image/' . $museum->image_path) }}" class="img-fluid" style="max-height: 400px;">
                   </div>
                   </div>

                   <div class="d-flex justify-content-center">
                   <div class="form-group row">
                   <div class="text-center">
                         <span class="font-weight-bold text-dark fs-10" style="font-size: 24px; white-space: nowrap; display: inline-block; text-align: center; width: 100%;">{{ $museum->title }}</span>
                   </div>
                   </div>
                   </div>

                   <div class="d-flex justify-content-center">
                   <div class="form-group row">
                   <div class="text-center">
                         <span class="font-weight-bold text-dark fs-10" style="font-size: 18px; white-space: nowrap; display: inline-block; text-align: center; width: 100%;">{{ $museum->body }}</span>
                   </div>
                   </div>
                   </div>             
                   
                    <div class="form-group row">
                        <input type="hidden" name="id" value="{{ $museum->id }}">
                        @csrf
                     <div class="d-flex justify-content-center">
                     <div class="btn-group">
                         <a href="{{ route('museum.index', ['id' => $museum->id]) }}" class="btn btn-light" style="background-color: white; color: gray; margin-right: 10px;">
                         もどる
                         </a>
                      </div>
                     
                      <div class="btn-group">
                         <a href="{{ route('admin.museum.edit', ['id' => $museum->id]) }}" class="btn btn-light" style="background-color: white; color: gray;">
                         編集
                         </a>
                      </div>
                      </div>
                      </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection