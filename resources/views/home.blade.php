@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @php
                            $cart = 'cart_'.uniqid();
                            $cart=[];
                            \Session::put(['cart' =>$cart]);
                        @endphp


                        You are logged in!


                        <div>The session ID is : {{\Session::getId()}}</div>

                        <div class="text-danger">php uniqid : {{uniqid()}}</div>
                        <div class="bg-danger">
                         <strong>The session Cart is :   </strong>{{var_dump(\Session::get('cart'))}}
                        </div>

                        <div>
                          <strong>uuid:</strong> {{\Str::uuid()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
