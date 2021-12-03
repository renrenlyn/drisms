<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Drisms</title>
        <link rel="shortcut icon" href="/images/icon.ico">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/css/style.css') }}" />
        <!-- Styles -->
        <style>
            html, body {
                background: linear-gradient(rgba(4,9,30,0.7), rgba(4,9,30,0.7)), url("/images/driving.jpg");
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                color: #fff;
                font-size: 100px;
            }
            p{
                margin: 10px 4px;
                font-size: 14px;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth 
                        <a href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a> 
                    @else
                        <a href="{{ route('login') }}">Login</a> 
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif 
            <div class="content">
                <div class="title m-b-md">
                        <h1>DriSMS || Driving School Management System</h1>
                        <p> Driving School System For those who wants an easy access askds</p>
                </div> 
            </div>
        </div>
    </body>
</html>
