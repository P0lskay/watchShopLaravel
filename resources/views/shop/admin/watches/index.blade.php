@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav class="navbar navbar-toogleable-md navbar-light bg-faded">
                <a href="{{route('shop.admin.watches.create')}}" class="btn btn-primary">Написать</a>
            </nav>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Заголовок</th>
                                <th>Категория</th>
                                <th>Производитель</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paginator as $watch)
                            @php /** @var \App\Models\BlogPost $item */ @endphp
                            <td>{{$watch->id}}</td>
                            <td>
                                <a href="{{route('shop.admin.watches.edit', $watch->id)}}">
                                    {{$watch->title}}
                                </a>
                            </td>
                            <td>{{$watch->category->id}}</td>
                            <td>{{$watch->producer}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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