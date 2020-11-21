@extends('templates.app')
@section('title','' )
@section('description', '' )
@section('content')
{{--    @include('chunks.delivery')--}}
    <main class="main">
        <section class="basket-section-wrp">
            <div class="container">
                <form  type="POST" action="{{ route('order') }}"  >
                    <meta name="_token" content="{{csrf_token()}}" />
                    <div class="basket-page-content">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="basket-content-block">
                                    <div class="your-orders-wrp">
                                        <div class="your-orders">
                                            <h2 id="go-order" class="second-level-title">Ваша корзина</h2>
                                            <div class="added-items-block">
                                                <ul class="added-items-list">
                                                    @include('chunks.basket.added_item_block')
                                                </ul>
                                            </div>
                                        </div>
                                        <span  class="all-price-for-all-products">Итого: <span class="item-sum-basket">{{ Cart::total() }}</span> рублей</span>
                                        <input type="hidden" name="count" value="{{ Cart::total() }}">
                                    </div>
                                    <div class="change-delivery-wrp">
                                        <h2 class="second-level-title">Адрес доставки</h2>
{{--                                        <div class="way-of-pay-and-delivery">--}}
{{--                                          <span class="way">--}}
{{--                                            <img src="{{ asset('img/way.svg') }}" alt="">--}}
{{--                                            <span>Доставка курьером</span>--}}
{{--                                          </span>--}}
{{--                                            <div class="way-descript">--}}
{{--                                                <span class="descript"><strong>От 1 рубля.</strong> Ближайшая доставка 16 января 2020.</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="delivery-adress">
                                            <input name="city" value="{{ old('city') }}"  autocomplete="off" id="city-validate" type="text" class="basic-input @if ($errors->has('flat')) error @endif" placeholder="Город, улица, номер дома*">
                                            @if ($errors->has('city'))
                                                <div style="margin-bottom: 20px; color: #dc3545;" id="invalid-feedback" class="">
                                                    <i style="margin-right: 5px;" class="fas fa-exclamation-circle"></i><span id="invalid-message"> {{ $errors->first('city') }} </span>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="small-inputs-row">
                                                        <input value="{{ old('flat') }}" name="flat" type="text" class="basic-input  @if ($errors->has('flat')) error @endif" placeholder="Кв/офис*">
                                                        <input name="floor" type="text" class="basic-input" placeholder="Этаж">
                                                        <input name="door" type="text" class="basic-input" placeholder="Подъезд">
                                                        <input name="domofon" type="text" class="basic-input" placeholder="Домофон">
                                                    </div>
                                                    @if ($errors->has('flat'))
                                                        <div style="margin-bottom: 20px; color: #dc3545;" id="invalid-feedback" class="">
                                                            <i style="margin-right: 5px;" class="fas fa-exclamation-circle"></i><span id="invalid-message"> {{ $errors->first('flat') }} </span>
                                                        </div>
                                                    @endif
                                                    <textarea name="comments" class="basic-input area" placeholder="Комментарий курьеру"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <h2 class="second-level-title">Получатель</h2>
                                        <div class="delivery-adress">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input value="{{ old('firstName') }}" name="firstName" type="text" class="basic-input @if ($errors->has('firstName')) error @endif"  placeholder="Имя *">
                                                    @if ($errors->has('firstName'))
                                                        <div style="margin-bottom: 20px; color: #dc3545;" id="invalid-feedback" class="">
                                                            <i style="margin-right: 5px;" class="fas fa-exclamation-circle"></i><span id="invalid-message"> {{ $errors->first('firstName') }} </span>
                                                        </div>
                                                    @endif
                                                    <input value="{{ old('LastName') }}" name="LastName" type="text" class="basic-input @if ($errors->has('LastName')) error @endif"  placeholder="Фамилия *">
                                                    @if ($errors->has('LastName'))
                                                        <div style="margin-bottom: 20px; color: #dc3545;" id="invalid-feedback" class="">
                                                            <i style="margin-right: 5px;" class="fas fa-exclamation-circle"></i><span id="invalid-message"> {{ $errors->first('LastName') }} </span>
                                                        </div>
                                                    @endif
                                                    <input value="{{ old('email') }}" name="email" type="text" class="basic-input @if ($errors->has('email')) error @endif"  placeholder="Электронная почта *">
                                                    @if ($errors->has('email'))
                                                        <div style="margin-bottom: 20px; color: #dc3545;" id="invalid-feedback" class="">
                                                            <i style="margin-right: 5px;" class="fas fa-exclamation-circle"></i><span id="invalid-message"> {{ $errors->first('email') }} </span>
                                                        </div>
                                                    @endif
                                                    <input value="{{ old('phone') }}" name="phone" type="tel" class="basic-input @if ($errors->has('flat')) error @endif"  placeholder="Номер телефона *">
                                                    @if ($errors->has('phone'))
                                                        <div style="margin-bottom: 20px; color: #dc3545;" id="invalid-feedback" class="">
                                                            <i style="margin-right: 5px;" class="fas fa-exclamation-circle"></i><span id="invalid-message"> {{ $errors->first('phone') }} </span>
                                                        </div>
                                                    @endif
                                                    <div class="add-phone">
                                                        <a href="" class="add-phone-button">Дополнительный номер телефона</a>
                                                        <input name="phone_sub" type="tel" class="basic-input" placeholder="Дополнительный номер телефона">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="date-and-time-of-delivery">--}}
                                        {{--<h2 class="second-level-title">Дата и время доставки</h2>--}}
                                        {{--<div class="product-descript">--}}
                                            {{--<span class="price"><strong>Укажите корректный адрес доставки, чтобы выбрать дату и время</strong></span>--}}
                                        {{--</div>--}}
                                        {{--@include('chunks.basket.delivery_info_row')--}}
                                        {{--@include('chunks.basket.your_orders_on_delivery')--}}
                                    {{--</div>--}}
                                    <div class="payments-wrp">
                                        <h2 class="second-level-title">Способ оплаты</h2>
                                        <div class="way-of-pay-and-delivery">
                                          <span class="way">
                                            <img src="{{ asset('img/way.svg') }}" alt="">
                                            <span>Оплатить онлайн</span>
                                          </span>
                                            <div class="way-descript">
                                                <span class="descript">Банковской картой</span>
                                            </div>
                                        </div>
                                        <div class="check-terms">
                                            <label class="terms">
                                                <input name="politica" type="checkbox" class="check" >
                                                <span class="check-basic"></span>
                                                <span class="check-text">Я соглашаюсь c <a href="">Условиями заказа и доставки</a>, на обработку персональных данных в соответствии с <a href="">Условиями использования сайта</a>, <a href="">Политикой обработки персональных данных</a> и на получение сообщений в процессе обработки заказа.</span>
                                            </label>
                                            @if ($errors->has('politica'))
                                                <div style="margin-bottom: 20px; color: #dc3545;" id="invalid-feedback" class="">
                                                    <i style="margin-right: 5px;" class="fas fa-exclamation-circle"></i><span id="invalid-message"> {{ $errors->first('politica') }} </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit" class="basic-button fiolet pay-order">Оформить заказ</button>
                                </div>
                            </div>
                        </div>

                        <div style="position: fixed;right: 20px;z-index: 99" class="col-md-4 col-md-6 col-sm-8 col-xs-10">
                            <div class="order-small-info">
                                <div class="small-order">
                                    <ul class="small-order-list">
                                        <li>
                                          <span class="items">
                                            Товары(<span class="item-count-basket">{{ Cart::count() }}</span>)
                                            <a href="#go-order" class="go-order go">
                                              <img src="{{ asset('img/edit.svg') }}" alt="">
                                            </a>
                                          </span>
                                          <span class="price"><span class="item-total-basket">{{ Cart::total() }}</span>  рублей</span>
                                        </li>

                                        <li>
                                          <span class="items">
                                            Доставка
                                            <a href="#go-deluvery" class="go-order go">
                                              <img src="{{ asset('img/edit.svg') }}" alt="">
                                            </a>
                                          </span>
                                            <span class="price"><span class="delivery-count-sum">{{ $countDelivery->getPayNds() }}</span> рублей</span>
                                        </li>

                                    </ul>
                                </div>
                                <div class="all-price">Итого: <span class="item-total-basket-delivery pay">{{ $countDelivery->getPayNds() + $count }}</span> рублей</div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection



{{--<h2 id="go-deluvery" class="second-level-title">Пункты выдачи <svg width="100" viewBox="0 0 154 42" fill="none" xmlns="http://www.w3.org/2000/svg" class="logo" data-v-208a69ab=""><path fill-rule="evenodd" clip-rule="evenodd" d="M104 42H114.944L119.646 28.7887L124.535 24.7392L128.386 36.6869C129.577 40.3797 130.803 42 133.477 42H141.856L133.212 18.5552L154 0H140.575L127.956 13.2116C126.486 14.7496 124.999 16.2634 123.508 18.0715H123.381L129.682 0H118.737L104 42Z" fill="#1AB248" data-v-208a69ab=""></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M103.528 0.00166416C106.96 0.00221654 110.289 0.00275227 113.077 0.00299438L110.818 6.93737C110.108 9.11608 108.306 10.1584 104.334 10.1584C97.4378 10.1584 87.2335 10.1572 80.3365 10.156L82.5955 3.22165C83.3052 1.04174 85.107 0 89.079 0C93.1875 0 98.47 0.000850164 103.528 0.00166416ZM83.5091 15.921C90.4051 15.921 100.61 15.9222 107.507 15.924L105.248 22.8581C104.538 25.0374 102.736 26.0791 98.7639 26.0791C91.8676 26.0791 81.6633 26.0779 74.7663 26.0761L77.0253 19.1427C77.735 16.963 79.537 15.921 83.5091 15.921ZM101.663 31.844C94.7665 31.8428 84.5622 31.8416 77.6659 31.8416C73.6932 31.8416 71.8918 32.8839 71.1821 35.062L68.9231 41.9973C75.8201 41.9979 86.0244 42 92.921 42C96.8927 42 98.6948 40.9574 99.4045 38.7781L101.663 31.844Z" fill="#1AB248" data-v-208a69ab=""></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M54.3767 10.116L60.25 10.1184C65.2542 10.1196 64.112 16.1685 61.5794 22.0639C59.3478 27.26 55.3927 31.8454 50.6743 31.8448L40.883 31.8436C36.9776 31.8436 35.177 32.8859 34.4175 35.0639L32 41.9988L39.1798 42L46.1982 41.9434C52.4223 41.8937 57.5178 41.4583 63.4765 36.2753C69.7737 30.8001 77.1159 16.5763 75.858 8.3494C74.8726 1.90253 71.2934 0.00299423 62.6263 0.00239538L46.8324 0L37.6363 26.0492L43.4793 26.0564C46.9568 26.0602 48.702 26.1025 50.5518 21.2848L54.3767 10.116Z" fill="#1AB248" data-v-208a69ab=""></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M27.376 10.1522L22.9585 10.1534C14.1091 10.1576 6.52603 31.8484 16.9894 31.8448L23.7124 31.8436C27.5898 31.8436 30.4682 33.214 29.1937 36.9092L27.4374 41.9988L20.3071 42L14.5073 41.9434C7.08759 41.8716 2.29964 38.3315 0.575665 32.9562C-1.28993 27.1394 1.34396 15.0071 8.98851 7.23525C13.4241 2.72654 19.5683 0.00299423 27.446 0.00239538L42 0L39.7249 6.35674C38.255 10.4639 35.2518 10.1576 33.538 10.157L27.376 10.1522Z" fill="#1AB248" data-v-208a69ab=""></path></svg></h2>--}}
{{--<div class="delivery-adress point">--}}
    {{--<div class="row">--}}
        {{--@foreach($points as $key=>$point)--}}
            {{--@if(($key % 2) == 0)--}}
                {{--<div class="col-md-6">--}}
                    {{--<p data-toggle="collapse" data-target="#point-num-{{ $key }}" aria-expanded="false" aria-controls="collapseTwo" class="text">--}}
                        {{--<input value="1" name="point" class="input_styled" type="radio"> {{ $point->Name }}--}}
                    {{--</p>--}}
                    {{--<p>{{ $point->Address }}</p>--}}
                {{--</div>--}}
            {{--@else--}}
                {{--<div class="col-md-6">--}}
                    {{--<p data-toggle="collapse" data-target="#point-num-{{ $key }}" aria-expanded="false" aria-controls="collapseTwo" class="text">--}}
                        {{--<input value="1" name="point" class="input_styled" type="radio"> {{ $point->Name }}--}}
                    {{--</p>--}}
                    {{--<p>{{ $point->Address }}</p>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--@endforeach--}}
    {{--</div>--}}



{{--</div>--}}