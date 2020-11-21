@extends('templates.app')
@section('title','' )
@section('description', '' )
@section('content')
    <main class="main">
        <section class="breadcrumbs-wrp">
            <div class="container">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li class="active">{{ $promotion->promotion }}</li>
                </ol>
            </div>
        </section>
        <section class="products-category-block-wrp">
            <div class="container">
                <div class="category-name-and-show-all">
                    <span class="category-name">{{ $promotion->promotion }}
                        <sup class="items">{{ count($promotion->products) }}</sup>
                    </span>
                </div>
                <div class="row">
                    <!-- Вьюха для вывода на ajax chunks\cart_product -->
                    <div id="product" class="catalog-content">
                        @include('chunks.cart_product',['products'=>App\Models\Product::whereIn('id',$promotion->products)->get()])
                    </div>
                </div>
            </div>
        </section>
        @include('templates.permission')
    </main>
@endsection