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

            <li>composer require paypal/rest-api-sdk-php</li>
            <li>https://developer.paypal.com/developer/

            <p> @business.example.com this is for you to sell (integrate - with your business) </p>
            <p> @personal.example.com this is for you to put it in sell account to buy things (end user ) </p>
            </li>

        </ol>
    </div>
@stop
