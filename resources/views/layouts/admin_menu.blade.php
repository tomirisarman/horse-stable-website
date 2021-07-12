<?php
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Route;
$current = Route::currentRouteName();
if(!$locale = session()->get('lang')){
    $locale = app()->getLocale();
}
if($locale=='cn'){
    $tr = new GoogleTranslate('zh');
}else{
    $tr = new GoogleTranslate($locale);
}
?>
    <li class="nav-item">
    <a class="nav-link" href="{{route('admin.horses')}}">{{$tr->translate('Horses')}}</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{route('admin.categories')}}">{{$tr->translate('Categories')}}</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{route('admin.colors')}}">{{$tr->translate('Colors')}}</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{route('admin.lines')}}">{{$tr->translate('Lines')}}</a>
    </li>
