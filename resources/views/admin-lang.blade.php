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