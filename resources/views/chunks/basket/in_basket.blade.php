@php $productModel = App\Models\Product::find($product->options->product_id) @endphp
<div class="container">
    <div class="row">
        <div class="add-to-basket-content">
            <div class="col-md-3 col-sm-5 col-xs-5">
                <div class="add-product-info">
                    <img src="{{ asset('img/basket-fiolet.svg') }}" alt="Товар успешно добавлен">
                    <span>Товар добавлен в корзину!</span>
                </div>
            </div>
            <div class="col-md-5 hidden-mobile-item">
                <div class="some-product">
                    <div class="product-image">
                        <img src="{{ $productModel->image }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-name-and-price">
                        <a href="" class="product-name">{{ $product->name }}</a>
                        <div class="price-row">
                            <span class="price"><span>{{ number_format($product->price, 0, '', ' ')  }}</span> рублей</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-7 col-xs-7">
                <div class="go-order-row">
                    <a href="{{ route('pages.basket') }}" class="go-order basic-button fiolet">Перейти к оформлению</a>
                    <a onclick="clouse_modal()" class="close-order-window"><img src="{{ asset('img/close.svg') }}" alt="Закрыть модальное окно"></a>
                </div>
            </div>
        </div>
    </div>
</div>