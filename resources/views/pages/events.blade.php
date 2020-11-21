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
                    <li class="active">Акции</li>
                </ol>
            </div>
        </section>
        <section class="products-category-block-wrp">
            <div class="container">
                <div class="category-name-and-show-all">
                    <span class="category-name">Акции
                        <sup class="items">{{ $events->count() }}</sup>
                    </span>
                </div>
                <div class="row">
                    <div class="catalog-content">
                        @foreach($events as $event)
                            <div class="col-md-3 col-xs-6">
                                <div class="item-of-product hit discount">
                                    <a target="_blank" href="{{ $event->link }}" class="product-image">
                                        <img src="{{ $event->img }}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @include('templates.permission')
    </main>
@endsection