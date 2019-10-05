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
                    BIG DEAL LARAVEL 6 COURSES BIG DEAL LARAVEL 6 COURSES BIG DEAL LARAVEL 6 COURSES
                    BIG DEAL LARAVEL 6 COURSES BIG DEAL LARAVEL 6 COURSES BIG DEAL LARAVEL 6 COURSES
                </p>
                <h2 class="text-muted text-success text-break">
                    <a href="#" class="btn btn-primary btn-block btn-lg">BUY NOW !</a>
                </h2>
            </div>
        </div>


    </header>


    {{--random cursole--}}
    <div class=" mb-5 bg-dark">
        <div class="col-12 ">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($randomproducts as $randomproduct)
                        <div class='carousel-item text-center {{ $loop->iteration == 1 ? 'active' : '' }}'>
                            <div class="row">
                                <div class="col-4">
                                    <img class="w-50" src='{{asset("/img/$randomproduct->image_path")}}' alt="">

                                </div>
                                <div class="col-3">
                                    <div class="">
                                        <h5> {{$randomproduct->brand}}</h5>
                                        <p> {{$randomproduct->name}}</p>
                                        <p class="badge badge-danger"> {{$randomproduct->price}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>


    <!-- Page Features -->
    <div class="row text-center">


        @foreach($products as $product)

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top h-25" src='{{asset("/img/$product->image_path")}}' alt="">
                    <div class="card-header letter">{{strtoupper($product->brand)}}</div>
                    <div class="card-body">
                        <h4 class="card-title">{{strtoupper($product->name)}}</h4>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($product->description,100)}}
                            <a href="{{$product->id}}">read more</a>
                        </p>
                    </div>

                    <div class="card-footer">
                        <div class="text-danger">
                            {{$product->price}} $
                        </div>
                        <a href="{{route('cart.add',$product)}}" class="btn btn-primary"> + Add to cart </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!-- /.row -->


    {{--random--}}
    <div>
        <h4 class="card-header">Random Related Products!</h4>


        <div class="row">
            @foreach($randomproducts as $randomproduct)
                <div class="col-2 align-items-stretch">
                    <div class="card border ">
                        <div class="card-body">
                            <img class="card-img-bottom " src='{{asset("/img/$randomproduct->image_path")}}' alt="">
                            {{$randomproduct->brand}}
                            {{$randomproduct->name}}
                            {{$randomproduct->price}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <div class="container my-4">

        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top">
                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
            </div>
            <!--/.Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>
                <li data-target="#multi-item-example" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                     src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a class="btn btn-primary">Button</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                     src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a class="btn btn-primary">Button</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                     src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a class="btn btn-primary">Button</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                     src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a class="btn btn-primary">Button</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                     src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a class="btn btn-primary">Button</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                     src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a class="btn btn-primary">Button</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Second slide-->

                <!--Third slide-->
                <div class="carousel-item">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                     src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(53).jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a class="btn btn-primary">Button</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                     src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(45).jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a class="btn btn-primary">Button</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                     src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(51).jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a class="btn btn-primary">Button</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Third slide-->

            </div>
            <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->


    </div>






    <div id="gallery" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid" src="http://via.placeholder.com/800x450/caa8f5/ffffff?text=Image+1"
                             alt="Image 1"/>
                    </div>

                    <div class="col">
                        <img class="img-fluid" src="http://via.placeholder.com/800x450/9984d4/ffffff?text=Image+2"
                             alt="Image 2"/>
                    </div>

                    <div class="col">
                        <img class="img-fluid" src="http://via.placeholder.com/800x450/592e83/ffffff?text=Image+3"
                             alt="Image 3"/>
                    </div>

                    <div class="col">
                        <img class="img-fluid" src="http://via.placeholder.com/800x450/230c33/ffffff?text=Image+4"
                             alt="Image 4"/>
                    </div>

                    <div class="col">
                        <img class="img-fluid" src="http://via.placeholder.com/800x450/b27c66/ffffff?text=Image+5"
                             alt="Image 5"/>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid" src="http://via.placeholder.com/800x450/f35b04/ffffff?text=Image+6"
                             alt="Image 6"/>
                    </div>

                    <div class="col">
                        <img class="img-fluid" src="http://via.placeholder.com/800x450/f18701/ffffff?text=Image+7"
                             alt="Image 7"/>
                    </div>

                    <div class="col">
                        <img class="img-fluid" src="http://via.placeholder.com/800x450/f7b801/ffffff?text=Image+8"
                             alt="Image 8"/>
                    </div>

                    <div class="col">
                        <img class="img-fluid" src="http://via.placeholder.com/800x450/7678ed/ffffff?text=Image+9"
                             alt="Image 9"/>
                    </div>

                    <div class="col">
                        <img class="img-fluid" src="http://via.placeholder.com/800x450/3d348b/ffffff?text=Image+10"
                             alt="Image 10"/>
                    </div>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#gallery" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#gallery" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@stop
