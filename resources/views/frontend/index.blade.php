@extends('layouts.master')
@section('title')
    Elearning Shop for Laravel 6
@stop
@section('style')
    <style>
        .jumbotron {
            background-image: url("{{asset('img/bg.png')}}");
            background-size: contain;
        }
    </style>


@stop
@section('content')
    <!-- Jumbotron Header -->
    <header class="jumbotron my-4 shadow-lg">
        <div class="row">
            <div class="col-4 col-sm-4">
                <img src="{{asset('img/logo.png')}}" alt="logo" class="navbar-brand " width="200px">
            </div>
            <div class="col-8">
                {{-- @php
           $cartName='cart_'.Session::getId();// Do i need to rename the cart  ? no the session always has its own id for each user who use the session
          // 'cart2_'.\Session::getId() = array(); Error
          //'cart2_'.\Session::getId()= []; ErrorError
           $cartName=[];
           $cartName['A']='CCCCC';// way 1
           //$cartName=['B' =>'DDD'];// waY 2 - overwrite the WHOLE array !!
           //Session::put($cartName); // this must be associated arrray . Dont forget that the SESSION is assosiated array at the end of the day!




           //dd($cartName);
       @endphp--}}
                <h2 class="text-muted text-danger text-break">
                    BIG DEAL LARAVEL 6 COURSES
                    {{--session::getId() {{Session::getId()}}--}}
                </h2>
                <p>
                    BIG DEAL LARAVEL 6 COURSES  BIG DEAL LARAVEL 6 COURSES BIG DEAL LARAVEL 6 COURSES
                    BIG DEAL LARAVEL 6 COURSES  BIG DEAL LARAVEL 6 COURSES BIG DEAL LARAVEL 6 COURSES
                </p>
                <h2 class="text-muted text-success text-break">
                    <a href="#" class="btn btn-primary btn-lg">BUY NOW !</a>
                </h2>
            </div>
        </div>






    </header>

    <!-- Page Features -->
    <div class="row text-center">


        @foreach($products as $product)

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top h-25" src='{{asset("/img/$product->image_path")}}' alt="">
                    <div class="card-header">{{$product->brand}}</div>
                    <div class="card-body">
                        <h4 class="card-title">{{$product->name}}</h4>
                        <p class="card-text">
                           {{ \Illuminate\Support\Str::limit($product->description,250)}} <a href="{{$product->id}}">read more</a>
                        </p>
                    </div>
                    <div class="text-danger">
                        {{$product->price}} $
                    </div>
                    <div class="card-footer">
                        <a href="{{route('cart.add',$product)}}" class="btn btn-primary"> + Add to cart </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!-- /.row -->




@stop
