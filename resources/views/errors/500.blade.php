@extends('templates.app')
@section('title','Ой ошибка' )
@section('description', 'Произошла ошибка' )
@section('content')
    {{ Cart::destroy() }}
    <main class="main">
        <section class="breadcrumbs-wrp">
            <div class="container">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li class="active">О нас</li>
                </ol>
            </div>
        </section>
        <section class="about-us-page-wrp" style="background-image: url({{ asset('img/about-us.jpg') }})">
            <div class="container">
                <div class="about-us-page-content">
                    <h2 class="second-level-title">ОЙ, что-то пошло не так...</h2>
                    <span class="abut-us-text">Мы обязательно исправим эту ошибку!</span>
                </div>
            </div>
        </section>
    </main>
@endsection