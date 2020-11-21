@php $products = App\Models\Product::whereIn('id',$promotion->products)->get();   @endphp
<section class="products-category-block-wrp">
    <div class="container">
        <div class="category-name-and-show-all">
            <span class="category-name">{{ $promotion->promotion }}<sup class="items">{{ count($products) }}</sup></span>
            <a href="{{ route('promotion',$promotion->slug)  }}" class="show-all">
                <span class="show-all-text">Посмотреть всё</span>
                <span class="show-all-image">
                    <img src="{{ asset('img/show-all.svg') }}" alt="">
                </span>
            </a>
        </div>
        <div class="row">
            <div class="catalog-content">
                @include('chunks.cart_product',['products'=>$products->take(4)])
            </div>
        </div>
    </div>
</section>
