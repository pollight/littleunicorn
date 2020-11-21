@extends('templates.app')
@section('title','' )
@section('description', '' )
@section('content')
    <main class="main">
        <section class="breadcrumbs-wrp">
            <div class="container">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li class="active">О нас</li>
                </ol>
            </div>
        </section>
        <section class="about-us-page-wrp" style="background-image: url({{ asset('img/about-us.jpg') }})">
            <div class="container">
                <div class="about-us-page-content">
                    <h2 class="second-level-title">HEY LITTLE UNICORN  <br>интернет - магазин детских товаров и товаров для дома</h2>
                    <span class="abut-us-text">«Дарим сказку не только детям, но и их родителям»</span>
                    <img src="{{ asset('img/scroll.svg') }}" alt="" class="scroll-image">
                </div>
            </div>
        </section>
        <section class="some-about-wrp">
            <div class="container">
                <span class="some-about">Яркие ковры разных форм и текстур, сухие бассейны, пуфики и многое другое мы подбираем как для себя!</span>
            </div>
        </section>
        <section class="about-us-page-wrp" style="background-image: url(../img/about-us.jpg)">
            <div class="container">
                <div class="about-us-page-content">
                    <h2 class="second-level-title">О компании</h2>
                    <span class="abut-us-text">С 2017 года из маленького магазина в инстаграме мы доросли до полноценного<br> интернет-магазина с большой аудиторией.</span>
                </div>
            </div>
        </section>
        <section class="our-advantages-page-wrp">
            <div class="container">
                <h2 class="second-level-title">Наши преимущества</h2>
                <div class="row">
                    <div class="advantages-content">
                        <div class="col-sm-4 col-xs-6">
                            <div class="item-of-advantage">
                                <img src="../img/ap1.svg" alt="">
                                <span>Доставка в любую точку мира</span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="item-of-advantage">
                                <img src="../img/ap3.svg" alt="">
                                <span>Возможность создать любой дизайн и размер ковра</span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="item-of-advantage">
                                <img src="../img/ap4.svg" alt="">
                                <span>Большой ассортимент от посуды до качель</span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="item-of-advantage">
                                <img src="../img/ap5.svg" alt="">
                                <span>Гипоаллергенные материалы</span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="item-of-advantage">
                                <img src="../img/ap6.svg" alt="">
                                <span>Все товары просты в уходе и уборке</span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="item-of-advantage">
                                <img src="../img/ap7.svg" alt="">
                                <span>Более 25.000 заказов и довольных отзывов</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="requisits-wrp">
            <div class="container">
                <div class="row">
                    <div class="requisits-content">
                        <div class="col-md-4 col-xs-12">
                            <div class="requisits-title-block">
                                <h2 class="second-level-title">Реквизиты<br> компании<br> little unicorn</h2>
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="requisits-table-content">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Полное наименование:</td>
                                        <td class="val">Hey_little_unicorn</td>
                                    </tr>
                                    <tr>
                                        <td>Адрес для приема возвратов и корреспонденции:</td>
                                        <td class="val">Владивосток, Приморский край, Некрасовская 72, 690014, почтовое отделение номер 14. На ИП Дикун А.К.</td>
                                    </tr>
                                    <tr>
                                        <td>Юридический адрес:</td>
                                        <td class="val">Владивосток, ул. Сипягина 33, кв. 60</td>
                                    </tr>
                                    <tr>
                                        <td>ИНН:</td>
                                        <td class="val">254000630783</td>
                                    </tr>
                                    <tr>
                                        <td>ОГРН:</td>
                                        <td class="val">319253600114770</td>
                                    </tr>
                                    <tr>
                                        <td>Генеральный директор:</td>
                                        <td class="val">Дикун Анастасия Константиновна</td>
                                    </tr>
                                    <tr>
                                        <td>Наименование банка:</td>
                                        <td class="val">Дальневосточный банк ПАО Сбербанк</td>
                                    </tr>
                                    <tr>
                                        <td>БИК:</td>
                                        <td class="val">040813608</td>
                                    </tr>
                                    <tr>
                                        <td>Корреспондентский счет:</td>
                                        <td class="val">30101810600000000608</td>
                                    </tr>
                                    <tr>
                                        <td>Расчетный счет:</td>
                                        <td class="val">40802810950000002160</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="reviews-page-wrp">
            <div class="container">
                <h2 class="second-level-title">Отзывы наших клиентов</h2>
                <div class="row">
                    <div class="reviews-page-content">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="item-of-review">
                                <span class="text">Здравствуйте, приехали вчера только, наконец, доча все мозг вынесла когда поедем, дед мороз обратно заберет подаров)) Суперский ковер. Ребенка еле оттащили и отправили в садик, она там всем рассказала, мамаши начали звонить, спрашивать))</span>
                                <div class="name-and-stars">
                                    <span class="name">Войтенко Мария</span>
                                    <img src="../img/stars.png" alt="" class="stars">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="item-of-review">
                                <span class="text">Здравствуйте, приехали вчера только, наконец, доча все мозг вынесла когда поедем, дед мороз обратно заберет подаров)) Суперский ковер. Ребенка еле оттащили и отправили в садик, она там всем рассказала, мамаши начали звонить, спрашивать)) Здравствуйте, приехали вчера только.</span>
                                <div class="name-and-stars">
                                    <span class="name">Войтенко Мария</span>
                                    <img src="../img/stars.png" alt="" class="stars">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="item-of-review">
                                <span class="text">Здравствуйте, приехали вчера только, наконец, доча все мозг вынесла когда поедем, дед мороз обратно заберет подаров)) Суперский ковер. Ребенка еле оттащили и отправили в садик, она там всем рассказала, мамаши начали звонить, спрашивать))</span>
                                <div class="name-and-stars">
                                    <span class="name">Войтенко Мария</span>
                                    <img src="../img/stars.png" alt="" class="stars">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="item-of-review">
                                <span class="text">Добрый день! Давно хотела написать Вам огромное спасибо за ковёр!)) Пользуемся им уже более трех месяцев и ни разу не пожалели, что заказали именно стёганный. Это просто находка для меня, мягкий, удобный, теплый, не скользит, не заворачивается, нет никакого запаха.</span>
                                <div class="name-and-stars">
                                    <span class="name">Войтенко Мария</span>
                                    <img src="../img/stars.png" alt="" class="stars">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="item-of-review">
                                <span class="text">Здравствуйте, приехали вчера только, наконец, доча все мозг вынесла когда поедем, дед мороз обратно заберет подаров)) Суперский ковер. Ребенка еле оттащили и отправили в садик, она там всем рассказала, мамаши начали звонить, спрашивать))</span>
                                <div class="name-and-stars">
                                    <span class="name">Войтенко Мария</span>
                                    <img src="../img/stars.png" alt="" class="stars">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="item-of-review">
                                <span class="text">Здравствуйте, приехали вчера только, наконец, доча все мозг вынесла когда поедем, дед мороз обратно заберет подаров)) Суперский ковер. Ребенка еле оттащили и отправили в садик, она там всем рассказала, мамаши начали звонить, спрашивать)) Здравствуйте, приехали вчера только.</span>
                                <div class="name-and-stars">
                                    <span class="name">Войтенко Мария</span>
                                    <img src="../img/stars.png" alt="" class="stars">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="item-of-review">
                                <span class="text">Здравствуйте, приехали вчера только, наконец, доча все мозг вынесла когда поедем, дед мороз обратно заберет подаров)) Суперский ковер. Ребенка еле оттащили и отправили в садик, она там всем рассказала, мамаши начали звонить, спрашивать))</span>
                                <div class="name-and-stars">
                                    <span class="name">Войтенко Мария</span>
                                    <img src="../img/stars.png" alt="" class="stars">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="item-of-review">
                                <span class="text">Добрый день! Давно хотела написать Вам огромное спасибо за ковёр!)) Пользуемся им уже более трех месяцев и ни разу не пожалели, что заказали именно стёганный. Это просто находка для меня, мягкий, удобный, теплый, не скользит, не заворачивается, нет никакого запаха.</span>
                                <div class="name-and-stars">
                                    <span class="name">Войтенко Мария</span>
                                    <img src="../img/stars.png" alt="" class="stars">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>
@endsection