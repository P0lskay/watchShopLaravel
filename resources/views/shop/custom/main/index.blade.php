@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($paginator as $watch)
        <div class="col-sm-4">
            <div class="product">
                <h6 class="product_category">{{$watch->category->title}}</h6>
                <a href="" class="product_href">
                    <img class="product_img" align="center" src="{{$watch->image_URI}}" alt="" width="360" height="340">
                    <h5 class="product_title">{{$watch->title}}</h4>
                        <h6 class="product_producer">Производитель: {{$watch->producer}}</h6>
                </a>
            </div>
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