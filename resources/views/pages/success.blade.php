@extends('templates.app')
@section('title','Заказ успешно оформлен' )
@section('description', 'Заказ' )
@section('content')
    <main class="main">
        <section class="breadcrumbs-wrp">
            <div class="container">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li class="active">Заказ успешно оплачен</li>
                </ol>
            </div>
        </section>
        <section class="about-us-page-wrp" style="background-image: url({{ asset('img/about-us.jpg') }})">
            <div class="container">
                <div class="about-us-page-content">
                    <h2 class="second-level-title">Заказ успешно оплачен</h2>
                </div>
            </div>
        </section>




    </main>
@endsection