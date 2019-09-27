@extends('layouts.master')
@section('title','cart index')
@section('content')
    Cart index


    <div class="card mt-5">
        <div class="card-header">
            <h4>Cart Items</h4>
        </div>
        <ul class="list-group ">
            @foreach(\Session::get('cart') as $cartIndex=>$CartIndexValue)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$cartIndex}}
                    name:<span class="badge badge-success badge-pill">{{$CartIndexValue['product']['name']}}</span>
                    brand:<span class="badge badge-success badge-pill">{{$CartIndexValue['product']['brand']}}</span>
                    price:<span class="badge badge-primary badge-pill">{{$CartIndexValue['price']}}</span>
                    quantity:<span class="badge badge-primary badge-pill">{{$CartIndexValue['quantity']}}</span>
                </li>
            @endforeach
        </ul>

    </div>


@stop
