@extends('layouts.master')
@section('title')
    AYMAN TITLE
@stop
@section('content')
    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        @php

        @endphp
        <h2 class="text-muted text-danger text-break">session::getId() {{Session::getId()}}</h2>
        <h2 class="text-muted text-success text-break">{{--cart: {{ Session::get($cartName)}}--}}</h2>

        <p class="lead">{{Session::get('Id','Defaullt Variable')}}

        </p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
        <img class="card-img-top" src="http://placehold.it/500x325" alt="">
    </header>

    <!-- Page Features -->
    <div class="row text-center">


        @foreach($products as $product)

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse
                        necessitatibus neque.
                    </p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary"> + Add to cart </a>
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
