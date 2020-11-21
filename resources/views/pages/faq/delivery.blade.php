@extends('templates.app')
@section('title','' )
@section('description', '' )
@section('content')
    <main class="main">
        <section class="breadcrumbs-wrp">
            <div class="container">
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Главная</a>
                    </li>
                    <li class="active">Доставка</li>
                </ol>
            </div>
        </section>
        <section class="basic-text-block-wrp">
            <div class="container">
                <div class="delivery-content-page">
                    <h2 class="second-level-title">Доставка Почтой России по всей России</h2>
                    <div style="text-align: center; ">
                        <img src="{{ asset('img/dbde165ad1759b4b99ea2ba66503caa7f98fbad8.png') }}">
                    </div>
                </div>
            </div>
        </section>
{{--        <section class="calculate-terms-wrp">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-10 col-md-offset-1">--}}
{{--                        <div class="calculate-terms-content">--}}
{{--                            <h2 class="second-level-title">Условия доставки по вашему адресу</h2>--}}
{{--                            <div class="row">--}}
{{--                                <form id="form-delivery" action="{{ route('delivery.show') }}" method="post">--}}
{{--                                    {{ csrf_field() }}--}}
{{--                                    <div class="calculate-form">--}}
{{--                                        <div class="col-md-8 col-sm-6">--}}
{{--                                            <input type="text" class="basic-input" placeholder="Населенный пункт" class="city">--}}
{{--                                            <input value="{{ old('zip_code') }}" autocomplete="off" id="delivery" type="text" class="basic-input" name="city" placeholder="Введите название Вашего города">--}}
{{--                                            <input name="zip_code" type="hidden">--}}
{{--                                            <div  class="invalid-feedback">--}}
{{--                                                {{ $errors->first('zip_code')  }}--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-4 col-sm-6">--}}
{{--                                            <button class="basic-button fiolet calculate">Рассчитать</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

{{--        @if(isset($standartDelivery) && isset($middleDelivery) && isset($bigDelivery))--}}
{{--        <section class="calculate-terms-wrp">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-10 col-md-offset-1">--}}
{{--                        <div class="calculate-terms-content">--}}
{{--                            <h2 class="second-level-title">Расчет доставки</h2>--}}
{{--                            <div class="row">--}}
{{--                                <table class="table">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">Тип</th>--}}
{{--                                        <th scope="col">Минимальный срок доставки (дней)</th>--}}
{{--                                        <th scope="col">Максимальный срок доставки (дней)</th>--}}
{{--                                        <th scope="col">Цена (руб.)</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>Стандартная доставка</td>--}}
{{--                                        <td>{{ $standartDelivery['min'] }}</td>--}}
{{--                                        <td>{{ $standartDelivery['max'] }}</td>--}}
{{--                                        <td>{{ $standartDelivery['cost'] }}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Средне габаритная доставка</td>--}}
{{--                                        <td>{{ $middleDelivery['min'] }}</td>--}}
{{--                                        <td>{{ $middleDelivery['max'] }}</td>--}}
{{--                                        <td>{{ $middleDelivery['cost'] }}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Крупно габаритная доставка</td>--}}
{{--                                        <td>{{ $bigDelivery['min'] }}</td>--}}
{{--                                        <td>{{ $bigDelivery['max'] }}</td>--}}
{{--                                        <td>{{ $bigDelivery['cost'] }}</td>--}}
{{--                                    </tr>--}}


{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        @endif--}}

        <section class="delivery-terms-wrp">
            <div class="container">
                <div class="row">
                    <div class="delivery-terms-content">
                        <div class="col-md-4 col-xs-12">
                            <div class="item-of-delivery-terms">
                                <img src="{{ asset('img/kilo1.svg') }}" alt="">
                                <span class="term-name">Стандартная доставка</span>
                                <div class="text-block">
                                    <p class="text">Посылка стандарт</p>
                                    <p class="text">Общий вес заказа может быть до 10 кг</p>
                                    <p class="text">Упаковка: Коробка «S»</p>
                                    <p class="text">Доставка до почтового отделения</p>
                                    <p class="text">Средняя цена 230 руб</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="item-of-delivery-terms">
                                <img src="{{ asset('img/kilo2.svg') }}" alt="">
                                <span class="term-name">Средне габаритная доставка</span>
                                <div class="text-block">
                                    <p class="text">Посылка стандарт</p>
                                    <p class="text">Общий вес заказа может быть до 10 кг</p>
                                    <p class="text">Упаковка: Коробка «M»</p>
                                    <p class="text">Доставка до почтового отделения</p>
                                    <p class="text">Средняя цена 400 руб</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="item-of-delivery-terms">
                                <img src="{{ asset('img/kilo3.svg') }}" alt="">
                                <span class="term-name">Крупно габаритная доставка</span>
                                <div class="text-block">
                                    <p class="text">Посылка стандарт</p>
                                    <p class="text">Общий вес заказа может быть до 10 кг</p>
                                    <p class="text">Упаковка: Коробка «L»</p>
                                    <p class="text">Доставка до почтового отделения</p>
                                    <p class="text">Средняя цена 500 руб</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>
@endsection