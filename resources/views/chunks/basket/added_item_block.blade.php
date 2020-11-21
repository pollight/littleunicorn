@foreach(Cart::content() as $row)
    @php $product = App\Models\Product::find($row->options->product_id) @endphp
<li id="{{ $row->rowId }}">
    <a href="{{ $product->getActionCategory() }}"
       class="product">
        <span class="product-image">
            <img src="{{ $product->image }}" alt="">
        </span>
        <span class="product-name">{{ $row->name }}</span>
    </a>
    <span class="price"><span>{{ $row->price }}</span> рублей</span>
    <div class="quantity">
        <div class="loader-quantity">
            <img width="20" src="{{ asset('img/preloader.gif') }}">
        </div>
        <input  onchange="basket_update(this.value,'{{ $row->rowId }}')" type="number" class="quantity-input input_styled" min="1" step="1" value="{{ $row->qty }}">
    </div>
    <span class="all-price"><span>{{ $row->total }}</span> рублей</span>
    <a onclick="basket_remove( '{{ $row->rowId }}' )" class="remove-product"><img src="{{ asset('img/close.svg') }}" alt=""></a>
</li>
@endforeach
