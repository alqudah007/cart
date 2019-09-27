@extends('layouts.master')
@section('title','cart index')
@section('content')
    Cart index

    <ul class="list-group">
    @foreach(\Session::get('cart') as $key=>$value)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$key}}
            <span class="badge badge-primary badge-pill">{{$value['price']}}</span>
        </li>
        @endforeach
    </ul>


@stop
