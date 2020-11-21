<?php
use App\Models\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'indexController@index');

Route::get('page/{slug}', [
    'uses' => 'PageController@index'
])->where('slug', '([A-Za-z0-9\-\/]+)')->name('page');

Route::get('category/{slug}', [
    'uses' => 'CategoryController@index'
])->where('slug', '([A-Za-z0-9\-\/]+)')->name('category');

Route::get('product/{slug}', [
    'uses' => 'CategoryController@product'
])->where('slug', '([A-Za-z0-9\-\/]+)')->name('product');

Route::group([
    'prefix' => 'ajax',
], function () {
    Route::get('product', 'Ajax\ProductController@index')->name('ajax.product');
    Route::post('geo/set', 'Ajax\GeoController@set')->name('ajax.geo.set');
    Route::post('geo/change', 'Ajax\GeoController@change')->name('ajax.geo.change');

    Route::post('delivery/show', 'DeliveryController@show')->name('delivery.show');

    Route::post('delivery/product/cost', 'Ajax\DeliveryController@costProdut')->name('ajax.delivery.product.cost');

    Route::get('search','SearchController@index')->name('search');

    Route::group([
        'prefix' => 'basket',
    ], function () {
        Route::get('add', 'Ajax\BasketController@add')->name('ajax.basket.add');
        Route::post('update', 'Ajax\BasketController@update')->name('ajax.basket.update');
        Route::post('remove', 'Ajax\BasketController@remove')->name('ajax.basket.remove');
        Route::post('count', 'Ajax\BasketController@count')->name('ajax.basket.count');
        Route::get('total', 'Ajax\BasketController@total')->name('ajax.basket.total');
        Route::get('total/delivery', 'Ajax\BasketController@count_delivery')->name('ajax.count.delivery');
        Route::get('sum', 'Ajax\BasketController@sum')->name('ajax.basket.sum');
        Route::post('added_item', 'Ajax\BasketController@addedItem')->name('ajax.basket.added_item');
    });
});


Route::group([
    'prefix' => 'pages',
], function () {

    Route::get('faq/politics',function (){
        return view('pages.faq.politics');
    })->name('pages.politics');

    Route::get('faq/declaration',function (){
        return view('pages.faq.declaration');
    })->name('pages.faq.declaration');

    Route::get('about',function (){
        return view('pages.about');
    })->name('pages.about');

    Route::get('contacts',function (){
        return view('pages.contacts');
    })->name('pages.contacts');

    Route::get('faq/order',function (){
        return view('pages.faq.order');
    })->name('pages.faq.order');

    Route::get('faq/delivery',function (){
        return view('pages.faq.delivery');
    })->name('pages.faq.delivery');

    Route::get('faq/payed',function (){
        return view('pages.faq.payed');
    })->name('pages.faq.payed');

    Route::get('faq/return',function (){
        return view('pages.faq.return');
    })->name('pages.faq.return');

    Route::get('faq/requisites',function (){
        return view('pages.faq.requisites');
    })->name('pages.faq.requisites');

    Route::get('faq/delivery_and_order',function (){
        return view('pages.faq.delivery_and_order');
    })->name('pages.faq.delivery_and_order');

    Route::get('events','EventController@index')->name('pages.events');

    Route::get('basket','BasketController@index')->name('pages.basket');
});

Route::post('product/{product}/comment/add','CommentController@add')->name('comment.add');
Route::get('sklad','MoySkladController@index');
Route::get('modification','MoySkladController@modification');
Route::get('pochta','RussianPostController@index');
Route::get('order','OrderController@index')->name('order');
Route::get('order/add','OrderController@add')->name('order.add');
Route::get('callback','OrderController@callback')->name('callback');
Route::get('order/pay/success','PayController@success')->name('pay.success');
Route::get('calculator', function (){
    return view('calculator');
})->name('calculator');



Route::get('promotion/{slug}','PromotionController@index')->name('promotion');


















