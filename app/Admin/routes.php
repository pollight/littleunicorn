<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
//    $router->resource('blocks/sale', BlockSaleController::class);
//    $router->resource('blocks/category', DiscountCategoryController::class);

    $router->resource('categories', CategoryController::class);
    $router->resource('slider', SliderController::class);
    $router->resource('products', ProductController::class);
    $router->resource('promotions', PromotionController::class);
});
