@extends('main')

<?php
$current = Route::currentRouteName();
?>

@section('ru_route') {{route($current, ['locale' => 'ru'])}} @endsection
@section('en_route') {{route($current, ['locale' => 'en'])}} @endsection
@section('cn_route') {{route($current, ['locale' => 'cn'])}} @endsection

@section('content')
    <section id="#contacts">
        <div class="box">
            <h1 class="contact_title">{{__('msg.menu_contact')}}</h1>
            <div class="contact_text">
                <h3>{{__('msg.tel')}}: + 7 701 938 9251</h3>
                <h3>{{__('msg.mail')}}: info@bishi-teke.com</h3>
                <h3>{{__('msg.address')}}: {{__('msg.city')}}</h3>
            </div>
            <div class="send_contacts">

                @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('save_client')}}" method="post">
                    @csrf
                    <div>
                        <label for="name">{{__('msg.ur_name')}}: </label><input name="name" type="text"><br>
                    </div>
                    <div>
                        <label for="phone">{{__('msg.ur_tel')}}: </label><input name="phone" type="tel"><br>
                    </div>
                    <div>
                        <label for="email">{{__('msg.ur_mail')}}: </label><input name="email" type="email"><br>
                    </div>
                    <input type="submit" class="contact_us" value="{{__('msg.contact_us')}}">
                </form>
            </div>
        </div>
    </section>

@endsection