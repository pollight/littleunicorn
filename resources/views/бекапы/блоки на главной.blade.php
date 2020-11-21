<!--Хиты продаж -->
@if( $hitsCount > 0)
    <section class="products-category-block-wrp">
        <div class="container">
            <div class="category-name-and-show-all">
                <span class="category-name">sd<sup class="items">{{ $hitsCount }}</sup></span>
                <a href="{{ route('label',[$label->slug]) }}" class="show-all">
                    <span class="show-all-text">Посмотреть всё</span>
                    <span class="show-all-image"><img src="{{ asset('img/show-all.svg') }}" alt=""></span>
                </a>
            </div>
            <div class="row">
                <div class="catalog-content">
                    @foreach($hits as $hit)
                        @include('templates.products.cart',['product'=>$hit])
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
<!--Детям -->
@if( $childCount > 0)
    <section class="products-category-block-wrp with-bg">
        <div class="container">
            <div class="category-name-and-show-all">
                <span class="category-name">Детям <sup class="items">{{ $childCount }}</sup></span>
                <a href="" class="show-all">
                    <span class="show-all-text">Посмотреть всё</span>
                    <span class="show-all-image"><img src="{{ asset('img/show-all.svg') }}" alt=""></span>
                </a>
            </div>
            <div class="row">
                <div class="catalog-content">
                    @foreach($children as $child)
                        @include('templates.products.cart',['product'=>$child])
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
<!--лучшие акции Популярные товары -->

<!--Популярное -->
@if( $popularCount > 0)
    <section class="products-category-block-wrp with-bg">
        <div class="container">
            <div class="category-name-and-show-all">
                <span class="category-name">Популярное <sup class="items">{{ $popularCount }}</sup></span>
                <a href="" class="show-all">
                    <span class="show-all-text">Посмотреть всё</span>
                    <span class="show-all-image"><img src="{{ asset('img/show-all.svg') }}" alt=""></span>
                </a>
            </div>
            <div class="row">
                <div class="catalog-content">
                    @foreach($populars as $popular)
                        @include('templates.products.cart',['product'=>$popular])
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
<!--Новинки -->
@if( $productNewCount > 0)
    <section class="products-category-block-wrp">
        <div class="container">
            <div class="category-name-and-show-all">
                <span class="category-name">Новинки <sup class="items">{{ $productNewCount }}</sup></span>
                <a href="" class="show-all">
                    <span class="show-all-text">Посмотреть всё</span>
                    <span class="show-all-image"><img src="{{ asset('img/show-all.svg') }}" alt=""></span>
                </a>
            </div>
            <div class="row">
                <div class="catalog-content">
                    @foreach($products_new as $product_new)
                        @include('templates.products.cart',['product'=>$product_new])
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif