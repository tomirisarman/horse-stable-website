@extends('main')

<?php
$current = Route::currentRouteName();
?>

@section('ru_route') {{route($current, ['locale' => 'ru'])}} @endsection
@section('en_route') {{route($current, ['locale' => 'en'])}} @endsection
@section('cn_route') {{route($current, ['locale' => 'cn'])}} @endsection

@section('header')
    <div class="box titles">
        <h2 class="title">{{__('msg.menu_ahalteki')}}</h2>
        <h1 class="title_lg">Bishi Teke</h1>
        <a href="{{route('contact', app()->getLocale())}}"><button class="contact_us">{{__('msg.contact_us')}}</button></a>
    </div>
@endsection

@section('content')


@endsection