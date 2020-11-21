@extends('templates.app')
@section('title','' )
@section('description', '' )
@section('content')
    <main class="main">
        <section class="back-wrp">
            <div class="container">
                <div class="back-link">
                    <a href="{{ url()->previous() }}" class="back">
                        <img src="{{ asset('img/prev-product.svg') }}" alt="">Назад</a>
                </div>
            </div>
        </section>
        <section class="one-product-wrp">
            <div class="container">
                <div class="row">
                    <div class="one-product-content">
                        <div class="col-xs-12 mobile-product-name-and-articul">
                            <div class="about-product-info hit discount">
                                <div class="name-articuls-and-prices">
                                    <span class="name">{{ $product->name }}</span>
                                    <div class="articuls-row">
                                        <span class="art-item">Артикул: <span>{{ $product->article }}</span></span>
{{--                                        <span class="art-item">Продано: <span>1781</span></span>--}}
                                    </div>
                                    <div class="hit-and-discount">
{{--                                        @if($product->is_hit == 1)--}}
{{--                                            <span class="hit">Хит</span>--}}
{{--                                        @endif--}}
                                        @if($product->discount)
                                            <span class="discount">{{ $product->discount }}%</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-sliders">
                                <div class="product-slider-for">
                                    @foreach($product->images as $image)
                                    <div class="item-of-product-for">
                                        <img src="{{ Storage::url( $image )}}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="product-slider-nav">
                                    @foreach($product->images as $image)
                                    <div class="item-of-product-nav">
                                        <img src="{{ Storage::url( $image )}}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-product-info hit discount">
                                <div class="name-articuls-and-prices mobile-hidden">
                                    <span class="name">{{ $product->name }}</span>
                                    <div class="articuls-row">
                                        <span class="art-item">Артикул: <span>{{ $product->article }}</span></span>
{{--                                        <span class="art-item">Продано: <span>{{ $product->title }}</span></span>--}}
                                    </div>
                                    <div class="hit-and-discount">
                                        {{--@if($product->is_hit == 1)--}}
                                        {{--<span class="hit">Хит</span>--}}
                                        {{--@endif--}}
                                        @if($product->discount != null)
                                            <span class="discount">{{ $product->discount }}%</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="price-row">
                                    @if($product->discount != null)
                                        <span class="price"><span>{{ ($product->price) - ($product->price/100)*$product->discount  }}</span> рублей</span>
                                    @else
                                        <span class="price"><span>{{ $product->price }}</span> рублей</span>
                                    @endif

                                    @if($product->discount != null)
                                        <span class="old-price"><span>{{ $product->price }}</span> рублей</span>
                                    @endif
                                </div>

                                @if(count($product->options) > 0)
                                <div>
                                    <h3 style="margin-bottom: 10px;">Размеры:</h3>
                                    @foreach($product->options as $key=>$option)
                                        @if($option!=null)
                                        <span size="{{ $key }}"  price="{{ $option['value'] }}" class="size-option " >
                                            <a  class="price-current" style="text-decoration: none;color:black;" href="#">{{ $option['name'] }}</a>
                                        </span>
                                        @endif
                                    @endforeach
                                </div>
                                @endif

                                <span class="product-descript">{!! $product->getExcerpt() !!}</span>
                                <button product="{{ $product->id }}" class="basic-button fiolet in-basket add-to-basket">Добавить в корзину</button>
                                <ul class="region-anddelivery">
                                    <li><img src="{{ asset('img/pin-product.svg') }}" alt=""><span>Ваш регион: <span class="val">{{ session('geo')['city'] }}</span> </span></li>
                                    <li><img src="{{ asset('img/delivery-product.svg') }}" alt=""><span>Доставка: от <span class="val">5 <span class="delivery-count-to"></span> рабочих дней</span></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-product-descriptions">
                    <div class="item-of-descript">
                        <h2 class="second-level-title">Описание товара</h2>
                        <div class="hidden-mobile-info">
                            <div class="basic-text">
                                {!! $product->description !!}
                            </div>
                        </div>
                    </div>
{{--                    <div class="item-of-descript">--}}
{{--                        <h2 class="second-level-title">Характеристики</h2>--}}
{{--                        <div class="hidden-mobile-info">--}}
{{--                            <div class="tables-wrp">--}}
{{--                                <table class="table" >--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($product->modifications as $modification)--}}
{{--                                       @foreach(json_decode($modification->characteristics) as $characteristic)--}}
{{--                                        --}}{{--{{ dd($characteristic) }}--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ $characteristic->name }}</td>--}}
{{--                                            <td class="val">{{ $characteristic->value }}</td>--}}
{{--                                        </tr>--}}
{{--                                        @endforeach--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                <table class="table" >--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($product->options as $key=>$options)--}}
{{--                                        <tr>--}}
{{--                                            @foreach($options as $key=>$option)--}}
{{--                                                <td>{{ $option }}</td>--}}
{{--                                            @endforeach--}}
{{--                                        </tr>--}}
{{--                                   @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <div class="basic-text">--}}
{{--                                <p class="text">Информация о технических характеристиках, комплекте поставки, стране изготовления и внешнем виде товара носит справочный характер и основывается на последних доступных сведениях от производителя.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="item-of-descript reviews-mobile-hidden">
                        <div class="title-row">
                            <h2 class="second-level-title">Отзывы о товаре</h2>
                            <ul class="reviews-actions">
                                <li>
                                    <a  data-toggle="collapse" href="#collapseComments" aria-expanded="false" class="basic-button fiolet">Добавить отзыв</a>
                                </li>
{{--                                <li><a href="" class="basic-button black">Все отзывы</a></li>--}}
                            </ul>
                        </div>
                        <div class="collapse" id="collapseComments">
                            <div style=" width: 60%" class="card card-body">
                                <form action="{{ route('comment.add',$product) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="text" class="basic-input" name="name" placeholder="Введите Ваше ФИО">
                                    <input type="email" class="basic-input" name="email" placeholder="Введите Ваш Email">
                                    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                    <span class="politics">Нажимая на кнопку, я даю согласие на обработку <a href="{{ route('pages.politics') }}">персональных данных</a></span>
                                    <button style="    float: right; margin-bottom: 5px; margin-top: 15px;}"class="basic-button fiolet connect">Оставить отзыв</button>
                                </form>
                            </div>
                        </div>
                        <ul class="reviews-list">
                            @foreach($product->comments as $comment)
                            <li>
                                <div class="review-image">
                                    <img src="{{ asset('img/user.png') }}" alt="">
                                </div>
                                <div class="review-content">
                                    <span class="name">{{ $comment->name }}</span>
                                    <span class="date">{{ \Carbon\Carbon::parse($comment->created_at)->format('d.m.Y H:i')}}</span>
                                    <span class="comment">{{ $comment->title }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        @if($product->category->products->count() >= 10)
            <section class="products-category-block-wrp with-bg recomment-items-wrp">
            <div class="container">
                <div class="category-name-and-show-all">
                    <a href="" class="category-name recommend">Рекомендуемые товары</a>
                    <ul class="recommend-navs">
                        <li><button class="prev-recommend">
                                <img src="{{ asset('img/prev-product.svg') }}" alt=""></button>
                        </li>
                        <li><button class="next-recommend">
                                <img src="{{ asset('img/next-product.svg') }}" alt=""></button>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="catalog-content recommend-slider">
                        @include('chunks.cart_product',['products'=>$product->category->products->random(10)])
                    </div>
                </div>
            </div>
        </section>
        @endif
    </main>
@endsection