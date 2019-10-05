@extends('layouts.master')
@section('title')
    Check Out
@stop
@section('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>

        // TODO: Check if the item is still in my Inventory or no before charge user for it

        // Create a Stripe client.
        var stripe = Stripe('pk_test_bMY93xZv20b0eNTbjpzd3QO0005NewKX7b');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style, hidePostalCode: true});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        //2 Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Ayman add more options here to the form   Stripe.js reference
            // Collect more data from user to use in after charge ( order )
            var options = {
                name: document.getElementById('card-holdername').value,
                address_country: document.getElementById('address').value,
                address_line1: document.getElementById('address').value,
            };
            // End Ayman add more options here to the form   Stripe.js reference
            // CHANGE THE FOLOWING LINE TO ADD OPTIONS
            //  stripe.createToken(card).then <---- ORIGINAL

            stripe.createToken(card, options).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        //3 Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }


    </script>
@stop
@section('style')
    <style>

        /**
         * The CSS shown here will not be introduced in the Quickstart guide, but shows
         * how you can use CSS to style your Element's container.
         */
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>

@stop
@section('content')

    <div class="container m-5">

        <div class="card   mt-5">
            <div class="card">
                <div class="card-header">
                    <h3> Use this to start Strip Check Out 💲</h3>
                </div>
                <div class="card-body">

                    {{--form B--}}
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <ol>
                                <li>https://stripe.com/docs/payments</li>
                                <li>https://stripe.com/docs/stripe-js</li>
                                <li>
                                    <div>
                                        4242 4242 4242 4242
                                    </div>
                                </li>
                                <li> // TODO: Check if the item is still in my Inventory or no</li>
                            </ol>
                        </div>


                        <div class="col-md-6 ">
                            <form action="{{route('cart.pay')}}" method="post" id="payment-form">
                                @csrf
                                <div class="form-row ">
                                    <label for="card-holdername">
                                       <strong>Card Holder Name </strong>
                                    </label>
                                    <input class="form-control" type="text" id="card-holdername" name="card-holdername"
                                           placeholder="card holder name">

                                </div>
                                <div class="form-row mt-3">
                                    <label for="address">
                                        <strong> Address </strong>
                                    </label>
                                    <input class="form-control" type="text" id="address" name="address"
                                           placeholder="address">

                                </div>


                                <div class="form-row mt-3">
                                    <label for="card-element">
                                        <strong>  Credit or debit card </strong>
                                    </label>
                                    <div id="card-element" class="border " style="width: 100%">
                                        <!-- A Stripe Element will be inserted here. -->

                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>
                                <div class="form-row mt-3">
                                    <button class="btn btn-lg btn-outline-danger "> 💰 💰 💰  Submit Payment to strip {\{cart.pay}\}
                                    </button>

                                </div>


                            </form>


                        </div>
                    </div>


                </div>
            </div>


        </div>

    </div>

@stop
