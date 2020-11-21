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
                    @foreach($slugs as $key=>$slug)
                        @php $cat =  App\Models\Category::where('slug',$slug)->first() @endphp
                        @if($loop->last)
                        <li   class="active" >
                            {{ $cat->name }}
                        </li>
                            @else
                            <li class="active" >
                                <a  href="{{ $cat->getActionCategory() }}">
                                    {{ $cat->name }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </section>
        <section class="products-category-block-wrp">
            <div class="container">
                <div class="category-name-and-show-all">
                    <span class="category-name">{{ $category->name }} <sup class="items">{{ $category->getCount() }}</sup></span>
                </div>
                <div class="row">
                    <div class="catalog-content">
                        @foreach($category->categories as $childrenCategory)
                            @if($countProducts = $childrenCategory->products->count() > 0)
                                <div class="col-md-3 col-xs-6">
                                    <div class="item-of-product hit discount">
                                        <a href="{{ $category->getActionCategory($childrenCategory) }}" class="product-image">
                                            <img src="{{ $childrenCategory->image }}" alt="">
                                        </a>
                                        <div class="product-info-block">
                                            <div style="margin-bottom: 0px;" class="text-center product-info">
                                                <a href="{{ $category->getActionCategory($childrenCategory) }}" class="product-name">{{ $childrenCategory->name }}</a>
{{--                                                <p>{{ $countProducts }} товаров</p>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @include('templates.permission')
    </main>
@endsection