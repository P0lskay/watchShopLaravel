@extends('layouts.app')

@section('content')
<table>
    @foreach($paginator as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->producer}}</td>
    </tr>
    @endforeach
</table>
@endsection