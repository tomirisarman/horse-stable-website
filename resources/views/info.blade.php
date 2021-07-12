@extends('main')

<?php
use Stichoza\GoogleTranslate\GoogleTranslate;
$current = Route::currentRouteName();
$locale = app()->getLocale();
if($locale=='cn'){
    $tr = new GoogleTranslate('zh', 'ru');
}else{
    $tr = new GoogleTranslate($locale, 'ru');
}
?>

@section('ru_route') {{route($current, ['locale' => 'ru', 'id'=>$horse->id])}} @endsection
@section('en_route') {{route($current, ['locale' => 'en', 'id'=>$horse->id])}} @endsection
@section('cn_route') {{route($current, ['locale' => 'cn', 'id'=>$horse->id])}} @endsection

@section('content')
    <style>
        table{
            font-size: 28px;
            column-gap: 50px;
            border: 2px solid gray;
        }
        td{
            padding: 20px;
        }
        td:nth-child(1){
            border-right: 1px solid gray;
        }
    </style>
    <h1 style="text-align: center">{{$tr->translate($horse->name)}}</h1>
    <div style="margin: 0 auto 0 auto; width: 1000px;">
        <div style="display: grid; grid-template-columns: 500px 500px; grid-gap: 50px;">
            <img width="100%" src="data:image/jpeg;base64, {{base64_encode($horse->img)}}"/>
            <table>
                <tr>
                    <td>{{__('msg.name')}}</td>
                    <td>{{$tr->translate($horse->name)}}</td>
                </tr>
                <tr>
                    <td>{{__('msg.category')}}</td>
                    <td>{{$tr->translate($category)}}</td>
                </tr>
                <tr>
                    <td>{{__('msg.color')}}</td>
                    <td>{{$tr->translate($color)}}</td>
                </tr>
                <tr>
                    <td>{{__('msg.year')}}</td>
                    <td>{{$horse->year}}</td>
                </tr>
                <tr>
                    <td>{{__('msg.size')}}</td>
                    <td>{{$horse->height}} - {{$horse->length}} - {{$horse->chest}}</td>
                </tr>
                <tr>
                    <td>{{__('msg.line')}}</td>
                    <td>{{$tr->translate($line)}}</td>
                </tr>

            </table>

        </div>
    </div>


@endsection