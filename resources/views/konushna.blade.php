@extends('main')

<?php
$current = Route::currentRouteName();
?>

@section('ru_route') {{route($current, ['locale' => 'ru'])}} @endsection
@section('en_route') {{route($current, ['locale' => 'en'])}} @endsection
@section('cn_route') {{route($current, ['locale' => 'cn'])}} @endsection

@section('content')

<section id="about_k">
    <div class="box">
        <div class="konushna">
            <h1>{{__('msg.menu_konushna')}}</h1>
            <img src="{{asset('assets/images/konushna.png')}}">
            <div class="desc">
                <div class="desc_text">
                    <p>{{__('msg.about_text')}}</p>
                    <a href="#">{{__('msg.more_info')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection