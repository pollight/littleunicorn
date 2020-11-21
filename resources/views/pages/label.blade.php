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
                    <li class="active">{{ $label->title }}</li>
                </ol>
            </div>
        </section>
        <section class="products-category-block-wrp">
            <div class="container">
                <div class="category-name-and-show-all">
                    <span class="category-name">{{ $label->title }}
                        <sup class="items">{{ $products->count() }}</sup>
                    </span>
                </div>
                <div class="row">
                    <div category="{{ $label->id }}" id="product" class="catalog-content">
                    </div>
                    <div class="show-more-row">
                        <a id="page" page="1" class="basic-button black">Показать ещё</a>
                    </div>
                </div>
            </div>
        </section>
        @include('templates.permission')
    </main>
@endsection