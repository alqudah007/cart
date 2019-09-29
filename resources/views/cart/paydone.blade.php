@extends('layouts.master')
@section('title')
    Pay Done after checout
@stop
@section('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        /* var stripe = Stripe('pk_test_bMY93xZv20b0eNTbjpzd3QO0005NewKX7b');


         stripe.redirectToCheckout({
             // Make the id field from the Checkout Session creation API response
             // available to this file, so you can provide it as parameter here
             // instead of the {/{$session->id}/} placeholder.
            sessionId: '{/{$session->id}/}'
        }).then(function (result) {
            // If `redirectToCheckout` fails due to a browser or network
            // error, display the localized error message to your customer
            // using `result.error.message`.
        });
*/


    </script>
@stop
@section('style')

@stop
@section('content')

    <div class="container m-5">

        <div class="card card-header  mt-5">
            <div class="card">
                <div class="card-header">
                    pay done
                </div>
                <div>
                    @if (\Session::has('pay-done'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <strong>Congratulations!</strong>
                            You successfully PAYYYYYYYYYYYYYYYYYYYYYYYYY FOR ME !
                            <br>
                           <a class="btn btn-warning" href=" {{\Session::get('receipt_url')  }}" >Click to see the money gone form you</a>
                        </div>
                    @elseif (\Session::has('pay-faild'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <strong>ERROR !</strong> NO MOENY !!!!!
                        </div>
                    @endif
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 border border-danger bg-light">
                            XXXXXXXXXXXX PAY DONE XXXXXX
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

@stop
