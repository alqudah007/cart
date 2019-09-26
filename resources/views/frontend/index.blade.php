@extends('layouts.master')
@section('title')
    AYMAN TITLE
@stop
@section('content')
    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
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
        <h2 class="text-muted text-danger text-break">session::getId() {{Session::getId()}}</h2>
        <h2 class="text-muted text-success text-break">{{--cart: {{ Session::get($cartName)}}--}}</h2>

        <p class="lead">{{Session::get('Id','Defaullt Variable')}}

        </p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
       {{-- <img class="card-img-top" src="http://placehold.it/500x325" alt="">--}}
    </header>

    <!-- Page Features -->
    <div class="row text-center">


        @foreach($products as $product)

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src='{{asset("/img/$product->image_path")}}' alt="">
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


    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
        </div>
        <!-- /.container -->
    </footer>


@stop
