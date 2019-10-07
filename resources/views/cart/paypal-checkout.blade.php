@extends('layouts.master')
@section('title')
    Pay pal Integration
@stop
@section('content')


    <div>
        <ol>
            <li>main site</li>
            <li>get the app secrets
                <p>
                    https://developer.paypal.com/developer/applications/edit/SB:QVNELW9XUnpQVUhoN196S1A5Z19JSDN1ZTQ1QjFmY0ZzV1pHa1ktdU82S2tlTVVjd1dXVkJwU2FrMGMtd2l3RnFfeERYODJxcHJQeFd4ZnU=?appname=Default%20Application
                </p>
            </li>


            <li> Create account bussiness - personal and create app in SANDBOX

                https://developer.paypal.com/developer/

            <p> @business.example.com this is for you to sell (integrate - with your business)((Merchant Account)) </p>
            <p> @personal.example.com this is for you to put it in sell account to buy things (end user ) (Buyer Account)</p>
            </li>
            <li>Install paypal SDK for php </li>
            <li>https://developer.paypal.com/docs/api/quickstart/install/ </li>
            <li>composer require paypal/rest-api-sdk-php</li>

            <li>
                # This one where we copy code sample
                http://paypal.github.io/PayPal-PHP-SDK/sample/

            </li>
        </ol>
    </div>


    # the steps as following :
    // 1- add js
    // 2- create the form to get access_token
    // 3- post to php code to proceed the payment

    // STEP No 1 : https://developer.paypal.com/docs/checkout/integrate/#1-set-up-your-development-environment
    // NOTE :without your SSSHOP Client id at the end of the script WILL NOT WORK !
    <script
        src="https://www.paypal.com/sdk/js?client-id=AQdXeQHYDwKMsyxa97Ldec1PfvKJGigjtvMniqBJsbvhiAQ4kVGo4RQta0YQl7yAU_ajCHsAqJX_4A3j">
    </script>


    // step 2 :add the button / form


    # This is the 2nd button with customization
    <div class="btn-dark">
        <div id="paypal-button-container2"></div>

        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                       //Ayamn add these
                        redirect_urls: {
                            return_url: 'https://example.com',
                            cancel_url: 'https://example.com'
                        },
                        //Ayamn add these ^^^^^
                        purchase_units: [{
                            amount: {
                                value: '100.01',
                                currency:'USD'
                            }
                        }]


                    });
                },

                onApprove: function(data, actions) {
                  return actions.order.capture().then(function(details) {
                        alert('Transaction completed by ' + details.payer.name.given_name);
                        console.log(data)    ;
                        console.log(details)    ;
                       /* return actions.redirect_urls({return_url:'http://xx444xx.com'}) ;*/

                        //AYMAN::::: Call your server to save the transaction
                        return fetch('/paypal-done-payment', {
                            method: 'post',
                            headers: {
                                'content-type': 'application/json'
                            },
                            body: JSON.stringify({
                                orderID: data.orderID
                            })
                        });
                    });
                },
                onAuthorize: function (data, actions) {
                    // Execute the payment here, when the buyer approves the transaction
                    console.log("AAAAAAAAAAAAAAa");
                },
                onCancel: function (data, actions) {
                    // Show a cancel page or return to cart
                    console.log("BBBBBBBBBBBBB");
                }

            }).render('#paypal-button-container2');
        </script>

    </div>



@stop
