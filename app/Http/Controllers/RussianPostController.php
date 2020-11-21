<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class RussianPostController extends Controller
{
    //
    public function index(){
        $objectId = 27030; // Письмо с объявленной ценностью
        // Минимальный набор параметров для расчета стоимости отправления
        $params = [
            'weight' => 10000, // Вес в граммах
            'from' => 690000, // Почтовый индекс места отправления
            'to' => session('geo')['postal_cade'],
//            pack - 20 (M) 10 (S)
            'pack' => 20
        ];

        // Список ID дополнительных услуг
        // 2 - Заказное уведомление о вручении
        // 21 - СМС-уведомление о вручении
//        $services = [2,21];

        $TariffCalculation = new \LapayGroup\RussianPost\TariffCalculation();
        $calcInfo = $TariffCalculation->calculate($objectId, $params);
        return $calcInfo;
    }
}
