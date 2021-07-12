@extends('main')

<?php
$current = Route::currentRouteName();
?>

@section('ru_route') {{route($current, ['locale' => 'ru'])}} @endsection
@section('en_route') {{route($current, ['locale' => 'en'])}} @endsection
@section('cn_route') {{route($current, ['locale' => 'cn'])}} @endsection

@section('content')

    <section id="about_p">
        <div class="box">
            <div class="poroda">
                <img src="{{asset('assets/images/about_p.png')}}">
                <div class="desc">
                    <h2>{{__('msg.menu_poroda')}}</h2>
                    <h1>{{__('msg.menu_ahalteki')}}</h1>
                    <div class="desc_text">
                        <p>{{__('msg.about_text')}}</p>
                        <a href="#">{{__('msg.more_info')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection