<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Indkøbs App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!--CSS-->
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <link rel="stylesheet" href="<?php echo asset('css/shopping/main.css')?>" type="text/css">
        <!--<link rel="stylesheet" href="<?php echo asset('css/manager_mobile.css')?>" type="text/css">-->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <!--JS-->

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    </head>
    
    <body>        
        <div class="row primary_container">
            @include('Shopping/layout/sidebar')
            @include('Shopping/layout/topbar')
            <div class="main-container scrollBar">
                @yield('content')
            </div>
        </div>
    </body>

    </html>

    <style>

        .scrollBar{
            overflow-y: none;
        }

        .scrollBar::-webkit-scrollbar {
                width: 10px;
        }

        .scrollBar::-webkit-scrollbar-thumb {
                background: black;
                border-radius: 5px;
                border-top: 70px solid transparent;
                border-bottom: 70px solid transparent;
                background-clip: padding-box;   /* THIS IS IMPORTANT */

        }

        .scrollBar::-webkit-scrollbar-track {
                background: rgb(180,180,180);
                border-left: 4px solid transparent;
                border-right: 4px solid transparent;
                border-top: 60px solid transparent;
                border-bottom: 60px solid transparent;
                background-clip: padding-box;   /* THIS IS IMPORTANT */
        }

    </style>