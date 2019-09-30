@extends('layouts.master')
@section('title')
    Check Out
@stop
@section('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>


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
                address_country:document.getElementById('address').value,
                address_line1:document.getElementById('address').value,
            };
            // End Ayman add more options here to the form   Stripe.js reference
            // CHANGE THE FOLOWING LINE TO ADD OPTIONS
            //  stripe.createToken(card).then <---- ORIGINAL

            stripe.createToken(card,options).then(function (result) {
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

                        <div>
                            4242 4242 4242 4242
                        </div>
                    </div>


                    {{--form a--}}
                    {{--  <div class="row  ">
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
                                                                                              class='form-control card-cvc'
                                                                                              placeholder='ex. 311'
                                                                                              size='4'
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
                                                      type='submit' style="margin-top: 10px;">Pay »
                                              </button>
                                          </div>
                                      </div>
                                      <div class='form-row'>
                                          <div class='col-md-12 error form-group hide'>
                                              <div class='alert-danger alert'>Please correct the errors and try
                                                  again.
                                              </div>
                                          </div>
                                      </div>
                                  </form>

                              </div>
                          </div>

                      </div>--}}

                    {{--form B--}}
                    <div class="row">
                        <div class="col-md-12 border border-danger bg-light">
                            <form action="{{route('cart.pay')}}" method="post" id="payment-form">
                                @csrf
                                <div class="form-row">
                                    <label for="card-holdername">
                                        card-holdername
                                    </label>
                                    <input class="form-control" type="text" id="card-holdername" name="card-holdername" placeholder="card holder name">

                                </div>
                                <div class="form-row">
                                    <label for="address">
                                        address
                                    </label>
                                    <input class="form-control" type="text" id="address" name="address" placeholder="address">

                                </div>


                                <div class="form-row">
                                    <label for="card-element">
                                        Credit or debit card
                                    </label>
                                    <div id="card-element" class="border border-warning" style="width: 100%">
                                        <!-- A Stripe Element will be inserted here. -->

                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>

                                <button class="btn btn-lg btn-success">Submit Payment to strip {\{cart.pay}\}</button>
                            </form>

                        </div>
                    </div>


                </div>
            </div>


        </div>

    </div>

@stop
