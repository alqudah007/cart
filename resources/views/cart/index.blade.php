@extends('layouts.master')
@section('title','cart index')
@section('content')
    Cart index
    {{--
     // TODO:: add the full functiond  for add remove cart
    --}}

    {{--other cart index--}}
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:1%">#</th>
                <th style="width:49%">Product</th>
                <th style="width:10%">Price 🤑 </th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%">action</th>
            </tr>
            </thead>
            <tbody>
            @if (!empty(Session::get('cart')))
                @foreach(Session::get('cart') as $cartIndex=>$CartIndexValue)
                    <tr>
                        <td data-th="Price">{{$loop->iteration}}</td>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs ">
                                    <img src="img/{{$CartIndexValue['product']['image_path']}}" width="100px" alt="..." class="img-responsive"/>
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{strtoupper($CartIndexValue['product']['brand'])}}</h4>
                                    <h4 class="nomargin">{{strtoupper($CartIndexValue['product']['name'])}}</h4>
                                    <p class="text-wrap text-break">
                                        {{\Str::limit($CartIndexValue['product']['description'],100)}}
                                    </p>
                                </div>

                            </div>
                        </td>
                        <td data-th="Price">${{$CartIndexValue['price']}}</td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center"
                                   value="{{$CartIndexValue['quantity']}}">
                        </td>
                        <td data-th="Subtotal"
                            class="text-center">{{$CartIndexValue['quantity']*$CartIndexValue['price'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm w-100"><i class="fa fa-refresh"></i>Update</button>
                            <button class="btn btn-danger btn-sm w-100"><i class="fa fa-trash-o"></i>Delete</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <div class="btn-danger">no item in cart</div>
            @endif
            </tbody>
            <tfoot>
            {{--total footer--}}
            <tr class="bg-dark ">
                <td class=""></td>
                <td class=""></td>
                <td class=""></td>
                <td class=""></td>
                <td class=""></td>
                <td class=""></td>
            </tr>


            <tr>
                <td><a href="{{route('cart.index')}}" class="btn btn-warning">
                        <i class="fa fa-angle-left"></i> Back </a></td>
                <td></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center ">
                    <strong>
                        @if (Session::has('total') && ! empty(Session::get('total')))
                            {{Session::get('total')}} $
                        @else
                            {{"0.0 $"}}

                        @endif
                    </strong>
                </td>
                <td><a href="{{route('cart.checkout')}}" class="btn btn-danger btn-block">Checkout <i
                            class="fa fa-angle-right"></i></a></td>
            </tr>
            </tfoot>
        </table>
    </div>
@stop
