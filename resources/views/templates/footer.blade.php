<div class="layer"></div>

<footer class="footer">
    <div class="footer-topline">
        <div class="container">
            <div class="row">
                <div class="topline-content">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer-nav-block">
                            <span class="footer-nav-name">Сервис и поддержка</span>
                            <ul class="footer-nav">
                                {{--<li><a href="{{ route('pages.faq.order') }}">Как сделать заказ?</a></li>--}}
                                <li><a href="{{ route('pages.faq.delivery') }}">Доставка</a></li>
                                <li><a href="{{ route('pages.faq.payed') }}">Оплата</a></li>
                                <li><a href="{{ route('pages.faq.return') }}">Возврат</a></li>
                                <li><a href="{{ route('pages.events') }}">Акции</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="footer-nav-block">
                            <span class="footer-nav-name">Маркетплейс</span>
                            <ul class="footer-nav">
                                <li><a href="{{ route('pages.about') }}">О компании</a></li>
                                <li><a href="{{ route('pages.contacts') }}">Контакты</a></li>
{{--                                <li><a href="{{ route('pages.faq.requisites') }}">Реквизиты</a></li>--}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="footer-nav-block">
                            <span class="footer-nav-name">Правовая информация</span>
                            <ul class="footer-nav">
                                <li><a href="{{ route('pages.politics') }}">Политика обработки<br> персональных данных</a></li>
                                <li><a href="{{ route('pages.faq.delivery_and_order') }}">Условия заказа и доставки</a></li>
                                <li><a href="{{ route('pages.faq.declaration') }}">Условия пользования сайтом</a></li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="footer-nav-block">
                            <span class="footer-nav-name">Cледуйте за нами</span>
                            <ul class="networks-list">
                                <li><a href=""><img src="{{ asset('img/fb.svg') }}" alt=""></a></li>
                                <li><a href="https://m.vk.com/albums478198227"><img src="{{ asset('img/vk.svg') }}" alt="unicorn | вконтакте"></a></li>
                                <li><a href="https://www.instagram.com/hey_little_unicorn"><img src="{{ asset('img/inst.svg') }}" alt="unicorn | instagram "></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-centerline">
        <div class="container">
            <div class="row">
                <div class="centerline-content">
                    <div class="col-lg-7">
                        <div class="questions-block-content">
                            <div class="question-block"><span>Остались вопросы?</span></div>
                            <div class="question-block">
                                <span>Звоните</span>
                                <a href="tel:88001002020" class="phone">8 800 100 20-20</a>
                            </div>
                            <div class="question-block">
                                <span>или пишите</span>
                                <ul class="networks-list">
                                    <li><a href=""><img src="{{ asset('img/tg.svg') }}" alt=""></a></li>
                                    <li><a href=""><img src="{{ asset('img/viber.svg') }}" alt=""></a></li>
                                    <li><a href="https://wa.me/79024848868"><img src="{{ asset('img/whatsapp.svg') }}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mobile-hidden">
                        <div class="questions-block-content">
                            <div class="question-block">
                                <span>Принимаем к оплате:</span>
                                @include('chunks.bank_icon')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottomline">
        <div class="container">
            <div class="bottomline-content">
                <span class="copy"><strong>2015-2020 magazin.ru</strong> - интернет-магазин товаров разносторонней тематики</span>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="modal-call">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <img src="{{ asset('img/close-white.svg') }}" alt="">
            </button>
            <h2 class="second-level-title">Свяжитесь с нами!</h2>
            <span class="modal-descript">Мы позвоним Вам в течение 10 минут</span>
            <form>
                <input type="text" class="basic-input" name="name" placeholder="Введите Ваше имя">
                <input type="tel" class="basic-input" name="phone" placeholder="Введите Ваш номер">
                <button class="basic-button fiolet connect">Связаться с нами</button>
                <span class="politics">Нажимая на кнопку, я даю согласие на обработку <a href="{{ route('pages.politics') }}">персональных данных</a></span>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-thanks">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <img src="{{ asset('img/close-white.svg') }}" alt="">
            </button>
            <h2 class="second-level-title">Спасибо!</h2>
            <span class="modal-descript">Ждите нашего звонка</span>
            <img src="{{ asset('img/phone-modal.svg') }}" alt="" class="phone-thanks">
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery.formstyler.js') }}"></script>
<script src="{{ asset('js/slick.js') }}"></script>
<!-- My JS -->
<script src="{{ asset('js/celdrusch.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@19.8.0/dist/js/jquery.suggestions.min.js"></script>
<!-- cookie -->
<script src="{{ asset('js/jquery.cookie.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@include('templates.js.product')
@include('templates.js.geo')
@include('templates.js.delivery')
@include('templates.js.basket')
