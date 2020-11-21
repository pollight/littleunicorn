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
                    <li class="active">{{ $category->title }}</li>
                </ol>
            </div>
        </section>
        <section class="products-category-block-wrp">
            <div class="container">
                <div class="category-name-and-show-all">
                    <span class="category-name">{{ $category->title }} <sup class="items">{{ $category->count() }}</sup></span>
                </div>
                <div class="row">
                    <div class="catalog-content">
                        @include('chunks.category')
                    </div>
                </div>
            </div>
        </section>
        @include('templates.permission')
    </main>
@endsection