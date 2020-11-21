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
                    <li class="active">Контакты</li>
                </ol>
            </div>
        </section>
        <section class="basic-text-block-wrp">
            <div class="container">
                <div class="basic-text-content">
                    <h2 class="second-level-title">Контакты</h2>
                    <div class="contacts-block-info">
                        <div class="contacts-row">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="contacts-row-content">
                                            <div class="col-sm-4 col-xs-6">
                                                <div class="cont-block">
                                                    <span class="block-name">Контакты для связи</span>
                                                    <ul class="networks-list">
                                                        <li><a href=""><img src="{{ asset('img/tg.svg') }}" alt=""></a></li>
                                                        <li><a href=""><img src="{{ asset('img/viber.svg') }}" alt=""></a></li>
                                                        <li><a href=""><img src="{{ asset('img/whatsapp.svg') }}" alt=""></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-6">
                                                <div class="cont-block">
                                                    <span class="block-name">Социальные сети</span>
                                                    <ul class="networks-list">
                                                        <li><a href=""><img src="{{ asset('img/fb.svg') }}" alt=""></a></li>
                                                        <li><a href=""><img src="{{ asset('img/vk.svg') }}" alt=""></a></li>
                                                        <li><a href=""><img src="{{ asset('img/inst.svg') }}" alt=""></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="cont-block">
                                                    <a href="#modal-call" class="basic-button fiolet" data-toggle="modal">Обратный звонок</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contacts-row">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="contacts-row-content">
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="cont-block">
                                                    <a href="tel:88001002020" class="connect-link"><img src="{{ asset('img/phone-contacts.svg') }}" alt="">8 800 100 20-20</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="cont-block">
                                                    <a href="mailto:littleunicorn@yandex.ru" class="connect-link"><img src="{{ asset('img/mail-contacts.svg') }}" alt="">littleunicorn@yandex.ru</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="cont-block">
                                                    <a href="skype:littleunicorn" class="connect-link"><img src="{{ asset('img/skype-contacts.svg') }}" alt="">littleunicorn</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contacts-row">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="contacts-row-content">
                                            <div class="col-md-7">
                                                <div class="cont-block">
                                                    <span class="connect-link"><img src="{{ asset('img/pin-contacts.svg') }}" alt="">Юридический адрес</span>
                                                    <span class="street-info">ул. Бессонова, дом 32ул. Бессонова, дом 32ул. Бессонова, дом 32 ул. Бессонова, дом 32ул. Бессонова, дом 32ул. Бессонова, дом 32</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>
@endsection



