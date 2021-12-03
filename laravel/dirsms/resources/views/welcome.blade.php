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
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="{{ asset('css/css/style.css') }}" />
        <!-- Styles -->
        <style>
            html, body {
                background: linear-gradient(rgba(4,9,30,0.7), rgba(4,9,30,0.7)), url("/images/driving.jpg");
                color: #636b6f;
                font-family: 'Poppins', sans-serif;
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
            .hero-btn{
                display: inline-block;
                text-decoration: none;
                color: #fff;
                border: 1px solid #fff;
                padding: 12px 34px;
                font-size: 13px;
                background: transparent;
                position: relative;
                cursor: pointer;
            }
            .hero-btn:hover{
                border: 1px solid #f44336;
                background: #f44336;
                transition: 1s;
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
                        <h1><b><i> DriSMS </i></b></h1>
                        <p> Driving School System For those who wants an easy access askds</p>
                        <a href="" class="hero-btn">Visit us to know more.</a>
                </div> 
            </div>
        </div>
    </body>
</html>
