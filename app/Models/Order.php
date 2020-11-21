<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $statuses = [
        0 => 'заказ зарегистрирован, но не оплачен',
        1 => 'предавторизованная сумма удержана',
        2 => 'оплачен',
        3 => 'авторизация отменена',
        4 => 'по транзакции была проведена операция возврата',
        5 => 'инициирована авторизация через сервер контроля доступа банка-эмитента',
        6 => 'авторизация отклонена',
    ];
    //
    public function baskets(){
        return $this->hasMany('App\Models\Basket', 'order_id', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public  function getStatus()
    {
        return $this->statuses[$this->status];
    }

}
