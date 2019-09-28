@extends('layouts.master')
@section('title','cart index')
@section('content')
    Cart index


    <div class="card mt-5">
        <div class="card-header">
            <h4>Cart Items</h4>
        </div>
        <ul class="list-group ">
            <li class="list-group-item d-flex justify-content-between align-items-center">

               <span class="btn btn-outline-dark"> index</span>
               <span class="btn  btn-outline-dark"> name</span>
               <span class="btn  btn-outline-dark">brand</span>
               <span class="btn  btn-outline-dark">price</span>
               <span class="btn  btn-outline-dark">quantity</span>
               <span class="btn  btn-outline-dark">SubTotal</span>
            </li>
            @if (!empty(Session::get('cart')))
                @foreach(Session::get('cart') as $cartIndex=>$CartIndexValue)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{$cartIndex}}
                        <span class="badge badge-success ">{{$CartIndexValue['product']['name']}}</span>
                        <span class="badge badge-success ">{{$CartIndexValue['product']['brand']}}</span>
                        <span class="badge badge-primary badge-pill">{{$CartIndexValue['price']}}</span>
                        <span class="badge badge-primary badge-pill">{{$CartIndexValue['quantity']}}</span>
                        <span class="badge badge-primary badge-pill">{{$CartIndexValue['quantity']*$CartIndexValue['price'] }}</span>
                    </li>
                @endforeach
            @else
            <div class="btn-danger">no item in cart</div>
            @endif
        </ul>

    </div>
    <div>
        <a href="{{route('cart.checkout')}}" class="btn btn-danger">cart.checkout</a>
    </div>
@stop
