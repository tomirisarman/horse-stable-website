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

@section('ru_route') {{route($current, ['locale' => 'ru', 'cat_id' => $cat_id])}} @endsection
@section('en_route') {{route($current, ['locale' => 'en', 'cat_id' => $cat_id])}} @endsection
@section('cn_route') {{route($current, ['locale' => 'cn', 'cat_id' => $cat_id])}} @endsection

@section('content')


    <div class="slider">
        <div class="slider__wrapper catalog">
            @foreach($horses as $horse)
            <div class="slider__item" style="background-image: url('data:image/jpeg;base64, {{base64_encode($horse->img)}}')">
                <div>
                    <div class="sale_text">
                        <h3>{{$tr->translate($horse->name)}}</h3>
                        <a href="{{route('show_info', ['locale'=>$locale, 'id' => $horse->id])}}"><button class="contact_us">{{__('msg.more_info')}}</button></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="slider__control slider__control_left" href="#" role="button"></a>
        <a class="slider__control slider__control_right slider__control_show" href="#" role="button"></a>
    </div>

    <script>
        'use strict';
        var multiItemSlider = (function () {
            return function (selector, config) {
                var
                    _mainElement = document.querySelector(selector), // основный элемент блока
                    _sliderWrapper = _mainElement.querySelector('.slider__wrapper'), // обертка для .slider-item
                    _sliderItems = _mainElement.querySelectorAll('.slider__item'), // элементы (.slider-item)
                    _sliderControls = _mainElement.querySelectorAll('.slider__control'), // элементы управления
                    _sliderControlLeft = _mainElement.querySelector('.slider__control_left'), // кнопка "LEFT"
                    _sliderControlRight = _mainElement.querySelector('.slider__control_right'), // кнопка "RIGHT"
                    _wrapperWidth = parseFloat(getComputedStyle(_sliderWrapper).width), // ширина обёртки
                    _itemWidth = parseFloat(getComputedStyle(_sliderItems[0]).width), // ширина одного элемента
                    _positionLeftItem = 0, // позиция левого активного элемента
                    _transform = 0, // значение транфсофрмации .slider_wrapper
                    _step = _itemWidth / _wrapperWidth * 100, // величина шага (для трансформации)
                    _items = []; // массив элементов
                // наполнение массива _items
                _sliderItems.forEach(function (item, index) {
                    _items.push({ item: item, position: index, transform: 0 });
                });

                var position = {
                    getMin: 0,
                    getMax: _items.length - 1,
                }

                var _transformItem = function (direction) {
                    if (direction === 'right') {
                        if ((_positionLeftItem + _wrapperWidth / _itemWidth - 1) >= position.getMax) {
                            return;
                        }
                        if (!_sliderControlLeft.classList.contains('slider__control_show')) {
                            _sliderControlLeft.classList.add('slider__control_show');
                        }
                        if (_sliderControlRight.classList.contains('slider__control_show') && (_positionLeftItem + _wrapperWidth / _itemWidth) >= position.getMax) {
                            _sliderControlRight.classList.remove('slider__control_show');
                        }
                        _positionLeftItem++;
                        _transform -= _step;
                    }
                    if (direction === 'left') {
                        if (_positionLeftItem <= position.getMin) {
                            return;
                        }
                        if (!_sliderControlRight.classList.contains('slider__control_show')) {
                            _sliderControlRight.classList.add('slider__control_show');
                        }
                        if (_sliderControlLeft.classList.contains('slider__control_show') && _positionLeftItem - 1 <= position.getMin) {
                            _sliderControlLeft.classList.remove('slider__control_show');
                        }
                        _positionLeftItem--;
                        _transform += _step;
                    }
                    _sliderWrapper.style.transform = 'translateX(' + _transform + '%)';
                }

                // обработчик события click для кнопок "назад" и "вперед"
                var _controlClick = function (e) {
                    if (e.target.classList.contains('slider__control')) {
                        e.preventDefault();
                        var direction = e.target.classList.contains('slider__control_right') ? 'right' : 'left';
                        _transformItem(direction);
                    }
                };

                var _setUpListeners = function () {
                    // добавление к кнопкам "назад" и "вперед" обрботчика _controlClick для событя click
                    _sliderControls.forEach(function (item) {
                        item.addEventListener('click', _controlClick);
                    });
                }

                // инициализация
                _setUpListeners();

                return {
                    right: function () { // метод right
                        _transformItem('right');
                    },
                    left: function () { // метод left
                        _transformItem('left');
                    }
                }

            }
        }());

        var slider = multiItemSlider('.slider')

    </script>


@endsection