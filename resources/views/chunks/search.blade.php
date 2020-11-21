@extends('templates.app')
@section('title','' )
@section('description', '' )
@section('content')
<section class="products-category-block-wrp">
    <div class="container">
        <div class="category-name-and-show-all">
            <span class="category-name">Вы искали: {{ request('search') }}
                <sup class="items">{{ $products->count() }}</sup>
            </span>
        </div>
        <div class="row">
            <div id="product" class="catalog-content">
                @foreach($products as $product)
                    <div class="col-md-3 col-xs-6">
                        <div class="item-of-product hit discount">

                            <a href="{{ $product->getActionCategory() }}" class="product-image">

                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                <span class="hit-and-discount">
{{--                @if($product->is_hit == 1)--}}
                                    {{--                    <span class="hit">Хит</span>--}}
                                    {{--                @endif--}}
                                    @if($product->discount)
                                        <span class="discount">{{ $product->discount }}%</span>
                                    @endif
            </span>
                            </a>
                            <div class="product-info-block">
                                <div class="product-info">
                                    <a href="{{ $product->getActionCategory() }}" class="product-name">{{ $product->name }}</a>
                                    <span class="product-descript">{!! $product->getExcerpt() !!}</span>
                                </div>

                                <div class="product-info price">
                                    <span class="price"><span>{{ $product->getPrice() }}</span> рублей</span>
                                </div>

                                <div class="product-actions">
                                    <a product="{{ $product->id }}" class="basic-button fiolet in-basket">В корзину</a>
                                    <a href="{{ $product->getActionCategory() }}" class="basic-button black">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection