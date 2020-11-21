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
                    <li class="active">Оплата и возврат</li>
                </ol>
            </div>
        </section>

        <section class="basic-text-block-wrp">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="basic-text-content">
                            <h2 class="second-level-title">Оплата</h2>
                            <div class="basic-text">
                                <p class="text">Понравившиеся вещи Вы можете оплатить перечисленными ниже способами</p>
                            </div>
                            <ul class="card-and-online-list">
                                <li>
                                    <a href="" class="card-link">1. Банковская карта <img src="{{ asset('img/right.svg') }}" alt=""></a>
                                    <div class="hidden-info">
                                        <div class="basic-text">
                                            <p class="text">Для этого у службы доставки есть специальные мобильные терминалы.</p>
                                            <p class="text">Оплата банковской картой, через Интернет, возможна через системы электронных платежей. </p>
                                            <p class="text">Минимальная сумма платежа - 1 рубль. <br> Максимальная сумма платежа отсутствует.</p>
                                            <p class="text">Номер карты (PAN) должен иметь не менее 15 и не более 19 символов.</p>
                                            <p class="text bold">Мы принимаем платежи через шлюз Сбербанка</p>
                                            <p class="text bold">Мы принимаем платежи с сайта по следующим банковским картам</p>
                                        </div>
                                        <ul class="networks-list">
                                            @include('chunks.bank_icon')
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="" class="card-link">2. Безопасность онлайн платежей <img src="{{ asset('img/right.svg') }}" alt=""></a>
                                    <div class="hidden-info">
                                        <div class="basic-text">
                                            <p class="text">В режиме он-лайн через систему электронных платежей можно оплатить следующими платежными средствами: — кредитные карты:</p>
                                        </div>
                                        @include('chunks.bank_icon')
                                        <div class="basic-text">
                                            <p class="text">Безопасность платежей обеспечивается использованием SSL протокола для передачи конфиденциальной информации от клиента на сервер системы для дальнейшей обработки. Дальнейшая передача информации осуществляется по закрытым банковским сетям высшей степени защиты.</p>
                                            <p class="text">Обработка полученных в зашифрованном виде конфиденциальных данных клиента (реквизиты карты, регистрационные данные и т. д.) производится в процессинговом центре. Таким образом, никто, даже продавец, не может получить персональные и банковские данные клиента, включая информацию о его покупках, сделанных в других магазинах.</p>
                                            <p class="text bold">Безопасность передаваемой информации. Для защиты информации от несанкционированного доступа на этапе передачи от клиента на сервер системы ASSIST используется протокол SSL 3.0, сертификат сервера (128 bit) выдан компанией Thawte — признанным центром выдачи цифровых сертификатов.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>
@endsection