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
                    <li>
                        <a href="{{ route('category',[$category->slug]) }}">{{ $category->title }}</a>
                    </li>
                    <li class="active">{{ $subcategory->title }}</li>
                </ol>
            </div>
        </section>
        <section class="products-category-block-wrp">
            <div class="container">
                <div class="category-name-and-show-all">
                    <span class="category-name">{{ $subcategory->title }}
                        <sup class="items">{{ $subcategory->products->count() }}</sup>
                    </span>
                </div>
                <div class="row">
                    <div id="product" class="catalog-content"></div>
                    <div class="show-more-row">
                        <a category="{{ $subcategory->id  }}" type="{{ $type }}" id="page" page="1" class="basic-button black">Показать ещё</a>
                    </div>
                </div>
            </div>
        </section>
        @include('templates.permission')
    </main>
@endsection