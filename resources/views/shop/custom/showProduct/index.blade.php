@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="watch">
                <h6 class="watch_category">{{$watch->category->title}}</h6>
                <a href="" class="watch_href">
                    <img class="watch_img" align="center" src="{{$watch->image_URI}}" alt="" width="660" height="620">
                    <h5 class="watch_title">{{$watch->title}}</h4>
                        <h6 class="watch_producer">Производитель: {{$watch->producer}}</h6>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection