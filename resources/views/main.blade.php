<?php

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bishi-Teke</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>

    </style>

</head>
<body>

<header>

    <div class="box-fluid">
        <a href="{{route('mainpage', app()->getLocale())}}"><img class="logo" src="{{asset('assets/images/logo.png')}}"></a>
        <navbar class="nav">
            <ul >
                <li><a href="{{route('poroda', app()->getLocale())}}">{{__('msg.menu_poroda')}}</a></li>
                <li><a href="{{route('forsale', app()->getLocale())}}">{{__('msg.menu_sale')}}</a></li>
                <li><a href="{{route('konushna', app()->getLocale())}}">{{__('msg.menu_konushna')}}</a></li>
                <li><a href="{{route('contact', app()->getLocale())}}">{{__('msg.menu_contact')}}</a></li>
                <span class="langs">
                     <li><a href="@yield('ru_route')">RU</a></li>
                    <li><a href="@yield('en_route')">ENG</a></li>
                    <li><a href="@yield('cn_route')">CN</a></li>
                </span>


            </ul>
        </navbar>
    </div>

    @yield('header')

</header>

@yield('content')

</body>
