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
                    <li class="active">Возврат</li>
                </ol>
            </div>
        </section>
        <section class="basic-text-block-wrp">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="basic-text-content">
                            <h2 class="second-level-title">Возврат</h2>
                            <div class="basic-text">
                                <p class="text">Интернет-магазин little unicorn информирует Вас об условиях, сроках и пунктах возврата товаров в крупных городах и регионах России.</p>
                                <div class="some-info">
                                    <h3 class="three-level-title">Срок возврата товара</h3>
                                    <div class="text-block">
                                        <p class="text bold">Срок возврата товара надлежащего качества составляет 21 день с момента получения товара*</p>
                                        <p class="text bold">Причинами для возврата товара** со стороны Покупателя могут быть следующие:</p>
                                        <p class="text">- Не подошел размер, фасон, цвет, длина и т.п.</p>
                                        <p class="text">Оттенок полученного товара отличается от оттенка модели с фотографии на сайте</p>
                                    </div>
                                    <div class="attention-info">
                                        <img src="{{ asset('img/attention.svg') }}" alt="">
                                        <div class="attention">
                                            <div class="text-block">
                                                <p class="text bold">Товар принимается назад только в полной комплектации, со всеми упаковками и наклейками, в непоношенном/неиспользованном виде</p>
                                                <p class="text">Качественные товары, не подлежащие обмену и возврату, указаны в Перечне, утвержденном постановлением Правительства РФ от 19 января 1998 г. № 55</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-block">
                                        <p class="text bold">Причины для возврата по ошибке*** little unicorn », в дальнейшем именуемого «Продавец»:</p>
                                        <p class="text">- Неправильная комплектация заказа</p>
                                        <p class="text">- Наличие дефекта/брака****</p>
                                        <p class="text bold">В случае неправильной комплектации заказа или наличии дефекта стоимость обратной доставки Почтой России оплачивает Продавец. Возврат денежных средств Клиенту осуществляется в течение 5-7 рабочих дней</p>
                                    </div>
                                    <h2 class="second-level-title">Возврат почтой</h2>
                                    <div class="text-block">
                                        <p class="text bold">Жители регионов России могут осуществить возврат товара почтой. При возврате Клиент оплачивает обратную доставку</p>
                                        <p class="text">Адрес для возврата:</p>
                                        <p class="text bold">Отказ от возврата Ваших посылок может произойти по следующим причинам:</p>
                                        <p class="text">- Нарушение целостности почтовой упаковки (пользуйтесь только оригинальной почтовой упаковкой, избегайте оклеивания скотчем (кроме почтового) и прочими материалами)</p>
                                        <p class="text">- Отправления наложенным платежом</p>
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