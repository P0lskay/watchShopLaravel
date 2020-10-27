@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($paginator as $watch)
        <div class="col-sm-4">
            <a href="">
                {{$watch->title}}
            </a>
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