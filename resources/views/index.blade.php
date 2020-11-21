@extends('templates.app')
@section('title','' )
@section('description', '' )
@section('content')
<main class="main">
    <!--слайдер -->
    <section class="screen-banner-wrp">
        <div class="container">
            <div class="screen-slider">
                @foreach(App\Models\Slider::all() as $slider)
                    <div class="item-of-screen-slider">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <div class="screen-slider-content">
                                        <div class="col-md-7">
                                            <div class="screen-content">
                                                <h2 class="second-level-title">{!! $slider->text !!}</h2>
                                                <a href="{{ $slider->url }}" class="basic-button white">Купить сейчас</a>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="screen-image">
                                                <img src="{{ $slider->img }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--блоки -->
    <section class="some-products-wrp">
        <div class="container">
            <div class="row">
                <div class="some-products-content">
                    <!--БЛОК РАНДОМ-->
{{--                    @if(App\Models\Product::all()->count() >= 4)--}}
{{--                        @foreach(App\Models\Product::all()->random(4) as $product)--}}
{{--                            @if($product != null)--}}
{{--                            <div class="col-md-3 hide-mobile">--}}
{{--                                <a href="{{ $product->getActionCategory() }}" class="item-of-some-product with-discount">--}}
{{--                                    @if($product->discount)--}}
{{--                                        <span class="discount">{{ $product->discount }}%</span>--}}
{{--                                    @endif--}}
{{--                                    <img src="{{ $product->image }}"--}}
{{--                                         alt="{{  $product->name }}">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
                    <!--БЛОК КАТЕГОРИЙ-->
                   @if(App\Models\Category::all()->count() >= 4)
                        @foreach(App\Models\Category::all()->random(4) as $key=>$category)
                            @if($category)
                                <div class="col-lg-3 col-xs-6">
                                    <a href="{{ $category->getActionCategory() }}" class="item-of-some-product small">
                                        <span class="some-small-product">
                                            <span class="product-image">
                                              <img src="{{ $category->image }}" alt="">
                                            </span>
                                            <span class="product-info">
                                              <span class="name">{{ $category->name }}</span>
                                              <span class="descript">{{ $category->getCount() }} товаров</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    @foreach(App\Models\Promotion::all() as $key=>$promotion)
        @if( $promotion->promotion == 'Хиты продаж' )
            @include('chunks.discount',compact('promotion'))
        @endif

        @if( $promotion->promotion == 'Детям' )
            @include('chunks.discount',compact('promotion'))
        @endif

        @if($key == 2)
            @include('chunks.banners',compact('promotion'))
        @endif

        @if( $promotion->promotion == 'Новинки' )
            @include('chunks.discount',compact('promotion'))
        @endif

         @if( $promotion->promotion == 'Популярное' )
            @include('chunks.discount',compact('promotion'))
        @endif

    @endforeach
            @include('templates.permission')
</main>
@endsection