@extends('layouts.master')
@section('title')
    Check Out
@stop
@section('script')
    <script src="https://js.stripe.com/v3/"></script>

@stop
@section('content')

    <div class="container m-5">

        <div class="card card-header  mt-5">
            <div class="card">
                <div class="card-header">
                    Use this to start Strip checout
                </div>
                <div class="card-body">
                   <div>
                     <ol>
                         <li>https://stripe.com/docs/payments</li>
                         <li>https://stripe.com/docs/stripe-js</li>
                     </ol>
                   </div>



                    <div class="row  ">
                        <div class="card ">
                            <div class="card-body mt-5">
                                <form accept-charset="UTF-8" action="/" class="require-validation"
                                      data-cc-on-file="false"
                                      data-stripe-publishable-key="test_public_key"
                                      id="payment-form" method="post">
                                    {{ csrf_field() }}
                                    <div class='form-row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> <input
                                                class='form-control' size='4' type='text'>
                                        </div>
                                    </div>
                                    <div class='form-row'>
                                        <div class='col-xs-12 form-group card required'>
                                            <label class='control-label'>Card Number</label> <input
                                                autocomplete='off' class='form-control card-number' size='20'
                                                type='text'>
                                        </div>
                                    </div>
                                    <div class='form-row'>
                                        <div class='col-xs-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                                            class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                                                            type='text'>
                                        </div>
                                        <div class='col-xs-4 form-group expiration required'>
                                            <label class='control-label'>Expiration</label> <input
                                                class='form-control card-expiry-month' placeholder='MM' size='2'
                                                type='text'>
                                        </div>
                                        <div class='col-xs-4 form-group expiration required'>
                                            <label class='control-label'> </label> <input
                                                class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                type='text'>
                                        </div>
                                    </div>
                                    <div class='form-row'>
                                        <div class='col-md-12'>
                                            <div class='form-control total btn btn-info'>
                                                Total: <span class='amount'>$300</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-row'>
                                        <div class='col-md-12 form-group'>
                                            <button class='form-control btn btn-primary submit-button'
                                                    type='submit' style="margin-top: 10px;">Pay »</button>
                                        </div>
                                    </div>
                                    <div class='form-row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try
                                                again.</div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>

                    <div>
                        <a href="{{route('cart.checkout')}}" class="btn btn-danger">pay.cart.checkout</a>
                    </div>


                </div>
            </div>


        </div>

    </div>

@stop
