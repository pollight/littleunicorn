{{--Модальное окно добавления товара в корзину --}}
<div class="add-to-basket-block"></div>
{{--Модальное окно добавления товара в корзину конец --}}
<header class="header">
    <div class="header-topline">
        <div class="container">
            <div class="row">
                <div class="topline-content">
                    <div class="col-md-2">
                        <a href="/" class="header-logo">
                            <img src="{{ asset('img/logo.svg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-7 hidden-on-basket-page">
                        <div class="geo-and-toline-nav">

                            <span data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" class="geo">
                                <img src="{{ asset('img/pin.svg') }}" alt=""><span id="send_city">{{ session('geo')['city'] }}</span>
                            </span>
                            <input value="{{ \request()->ip() }}" type="hidden" id="ip">

                            <ul class="topline-nav">
                                <li><a href="{{ route('pages.faq.delivery') }}">Доставка</a></li>
                                <li><a href="{{ route('promotion',App\Models\Promotion::getPopular()->slug) }}">Популярное</a></li>
                                <li><a href="#modal-call" data-toggle="modal">Звонок с сайта</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="topline-phone-and-delivery">
                            <a href="tel:88001002020" class="phone"><img src="{{ asset('img/phone.svg') }}" alt=""><span>8 800 100 20-20</span></a>
                            <span class="free-call">Бесплатно по России</span>
                        </div>
                    </div>
                </div>

                <div  id="collapseExample" class="container collapse geo-container-option">
                    <div class="row">
                        <h2 style="margin-bottom:5px;margin-left:15px;text-left: center;font-size: 28px;color: #000;font-family: 'MuseoSansCyrl-700';" class="category-name">Выберете город</h2>
                        <div class="col-md-6">
                            <input autocomplete="off" id="address" type="text" class="basic-input" name="city" placeholder="Введите название Вашего города">
                            <div class="option-geo"></div>
                            <button onclick="location.reload()" style="float: left;margin-right: 40px" class="basic-button fiolet connect confirm-button-geo">Выбрать</button>
                            <button onclick="hide_geo()" class="basic-button fiolet connect">отмена</button>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="header-bottomline">
        <div class="container">
            <div class="row">
                <div class="bottomline-content">
                    <div class="col-md-2">
                        <div class="catalog-button">
                            <span class="catalog" id="catalog">
                                <img src="{{ asset('img/menu.svg') }}" alt="">
                                <span>Каталог товаров</span>
                            </span>
                            <div class="only-catalog-menu">
                                <div class="catalog-nav">
                                    @include('chunks.nav.menu')
                                    <div class="catalog-undermenu-mobile">
                                        <ul class="geo-and-help">
                                            <li><a href="">Москва и Московская область</a></li>
                                            <li><a href="">Помощь покупателям</a></li>
                                        </ul>
                                        <a href="tel:88001002020" class="mobile-phone">8 800 100 20-20</a>
                                        <span class="free">Бесплатно по России</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mobile-logo">
                        <a href="/" class="header-logo">
                            <img  src="{{ asset('img/logo.svg') }}" alt="unicorn logo">
                        </a>
                    </div>
                    <div class="col-lg-7 col-md-6 hidden-search-block">
                        <div class="search-and-bottom-nav">
                            <button class="open-mobile-search">
                                <img src="{{ asset('img/search-mobile.svg') }}" alt="" class="open-search">
                                <img src="{{ asset('img/close.svg') }}" alt="" class="close-search">
                            </button>
                            <div class="search-row-wrp">
                                <form method="get" action="{{ route('search') }}">
                                    <div class="search">
                                        <input  type="text" name="search" placeholder="Введите название товара для поиска" autocomplete="off" class="search-input">
                                        <button class="btn_search"><img src="{{ asset('img/search.svg') }}" alt=""></button>
                                        <ul class="search-result-list"></ul>
                                    </div>
                                </form>
                            </div>
                            <ul class="bottomline-nav">
                                <li><a href="{{ route('promotion',App\Models\Promotion::find(3)->slug)  }}">Новинки</a></li>
                                <li><a href="{{ route('promotion',App\Models\Promotion::find(2)->slug)  }}">Хиты продаж</a></li>
                                <li><a href="{{ route('promotion',App\Models\Promotion::find(1)->slug)  }}">Детям</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="basket-button-wrp {{ Cart::count() > 0 ? 'active' : '' }} ">
                            <!--Если у basket-button-wrp есть класс active (это значит что добавлен как минимум 1 товар в корзину), то тогда при наведении на корзину вылезет окно с добавленными товарами. Если класса active нету, то при наведении не произойдет ничего и попасть невозможно даже на страницу корзины (таково условие заказчика было)-->
                            <a href="{{ route('pages.basket') }}" class="basket-button">
                                <img src="{{ asset('img/basket.svg') }}" alt="">
                                <span class="basket-content">
                           <span class="items item-count-basket">{{ Cart::count() }}</span>
                           <span class="basket-name">Корзина покупок</span>
                        </span>
                            </a>
                            <div class="added-items-block">
                                <ul class="added-items-list">
                                    @include('chunks.basket.added_item_block')
                                </ul>
                                <span class="all-price-for-all-products">Итого: <span class="item-total-basket">{{ Cart::total() }}</span> рублей</span>
                                <button onclick="location.replace('{{ route('pages.basket') }}')" class="pay-order basic-button fiolet">Оформить заказ <img src="{{ asset('img/arrow-right.svg') }}" alt=""></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>