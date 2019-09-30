@extends('layouts.master')
@section('title','Order Index')
@section('content')
    Order index


    <div class="card mt-5">
        <div class="card-header">
            <h4>User All Orders</h4>
        </div>


        @foreach($orders as $order)
            <div class="card-body">
                # {{$loop->iteration}}
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Amount

                        <span class="badge badge-danger "> {{$order->amount}} $</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        invoice link <a href="{{$order->receipt_url}} ">Pdf</a>

                    </li>


                </ul>
            </div>



            <div class="card-body">
                <ul class="list-group">
                    @foreach($order->cart as $cartitem)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Brand
                            <span class="badge badge-danger ">
                            {{$cartitem['product']['brand']}}
                    </span>

                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Name
                            <span class="badge badge-danger ">
                            {{$cartitem['product']['name']}}
                    </span>

                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Quantity
                            <span class="badge badge-danger ">
                        {{$cartitem['quantity']}}
                         </span>
                        </li>



                    @endforeach
                </ul>
            </div>



        @endforeach


    </div>

@stop
