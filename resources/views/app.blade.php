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

    <div class="box">
        <img class="logo" src="{{asset('assets/images/logo.png')}}">
            <navbar class="nav">
                <ul>
                    <li><a href="#about_p">О породе</a></li>
                    <li><a href="#for_sale">На продажу</a></li>
                    <li><a href="#about_k">О конюшне</a></li>
                    <li><a href="#contacts">Контакты</a></li>
                </ul>
            </navbar>
    </div>
    <div class="box titles">
        <h2 class="title">Ахалтекинские лошади</h2>
        <h1 class="title_lg">Bishi Teke</h1>
        <button class="contact_us">Связаться с нами</button>
    </div>
</header>

<section id="about_p">
    <div class="box">
        <div class="poroda">
            <img src="{{asset('assets/images/about_p.png')}}">
            <div class="desc">
                <h2>О породе</h2>
                <h1>Ахалтекинские лошади</h1>
                <div class="desc_text">
                    <p>
                        Ахалтекинская порода лошадей ценна раритетом, великолепным экстерьером, превосходными рабочими свойствами. Появилась она в туркменском племени Теке, владеющее наилучшими конными племенами. Название лошади пошло от оазиса Ахал, где жило самое многочисленное племя данного вида.
                        Это древнейшая из культурных пород, оказавшая влияние на многие породы — арабскую, чистокровную верховую (или английскую скаковую, англ. Thoroughbred) и другие. Этих изящных и выносливых животных называют золотыми конями, небесными аргамаками, ахалтекинцами или просто текинцами. Относится, наряду с чистокровной верховой и арабской, к числу чистокровных пород, так как является эталонной верховой лошадью и на протяжении 5000 лет не имела скрещиваний с другими породами. Хорошо приспособлена к сухому жаркому климату и прекрасно акклиматизируется в других условиях.
                    </p>
                    <a href="#">Больше информации</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="for_sale">
    <div class="catalog">
        <div>
            <div class="sale_text">
                <h3>Кобылы</h3>
                <button class="contact_us">Подробнее</button>
            </div>
        </div>
        <div>
            <div class="sale_text">
                <h3>Молодняк</h3>
                <button class="contact_us">Подробнее</button>
            </div>
        </div>
        <div>
            <div class="sale_text">
                <h3>Жеребцы</h3>
                <button class="contact_us">Подробнее</button>
            </div>
        </div>
    </div>
</section>

<section id="about_k">
    <div class="box">
        <div class="konushna">
            <h1>О конюшне</h1>
            <img src="{{asset('assets/images/konushna.png')}}">
            <div class="desc">
                <div class="desc_text">
                    <p>
                        Ахалтекинская порода лошадей ценна раритетом, великолепным экстерьером, превосходными рабочими свойствами. Появилась она в туркменском племени Теке, владеющее наилучшими конными племенами. Название лошади пошло от оазиса Ахал, где жило самое многочисленное племя данного вида.
                        Это древнейшая из культурных пород, оказавшая влияние на многие породы — арабскую, чистокровную верховую (или английскую скаковую, англ. Thoroughbred) и другие. Этих изящных и выносливых животных называют золотыми конями, небесными аргамаками, ахалтекинцами или просто текинцами. Относится, наряду с чистокровной верховой и арабской, к числу чистокровных пород, так как является эталонной верховой лошадью и на протяжении 5000 лет не имела скрещиваний с другими породами. Хорошо приспособлена к сухому жаркому климату и прекрасно акклиматизируется в других условиях.
                    </p>
                    <a href="#">Больше информации</a>
                </div>
            </div>
        </div>
    </div>

{{--<section id="for_sale">--}}
    {{--<div class="catalog">--}}
        {{--<div>--}}
            {{--<div class="sale_text">--}}
                {{--<h3>Дербес</h3>--}}
                {{--<button class="contact_us">Подробнее</button>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div>--}}
            {{--<div class="sale_text">--}}
                {{--<h3>Апархан</h3>--}}
                {{--<button class="contact_us">Подробнее</button>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div>--}}
            {{--<div class="sale_text">--}}
                {{--<h3>Аспазия</h3>--}}
                {{--<button class="contact_us">Подробнее</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

<section id="#contacts">
    <div class="box">
        <h1 class="contact_title">Контакты</h1>
        <div class="contact_text">
            <h3>ТЕЛ.: + 7 701 938 9251</h3>
            <h3>MAIL: info@bishi-teke.com</h3>
            <h3>АДРЕС: Г. АЛМАТЫ</h3>
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
                    <label for="name">Ваше имя: </label><input name="name" type="text"><br>
                </div>
                <div>
                    <label for="phone">Ваш телефон: </label><input name="phone" type="tel"><br>
                </div>
                <div>
                    <label for="email">Ваш e-mail: </label><input name="email" type="email"><br>
                </div>
                <input type="submit" class="contact_us" value="Связаться с нами">
            </form>
        </div>
    </div>
</section>

<footer>

</footer>

</body>
</html>
