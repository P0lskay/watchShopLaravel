@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($paginator as $watch)
        <div class="col-sm-4">
            <a href="" class="watch_product">
                <img class="watch_img" align="center" src="{{$watch->image_URI}}" alt="" width="250" height="280">
                <h5 class="watch_header">{{$watch->title}}</h4>
                    <h6 class="watch_producer">{{$watch->producer}}</h6>
            </a>
            <h6>{{$watch->category->title}}</h6>
        </div>
        @endforeach
    </div>
    @if($paginator->total() > $paginator->count())
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{$paginator->links()}}
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection