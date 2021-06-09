<?php

namespace FinalClass\RateClasses;

use src\AbstractClass\RateAbstractClass;

require_once DOCUMENT_ROOT . '/src/AbstractClass/RateAbstractClass.php';

class ForHourRateClass extends RateAbstractClass
{
    # метод расчета стоимости дополнительой услуги
    # метод принимает 2 параметра:
    # 1)кол-во часов для услуги PGS
    # 2) кол-во дополнительных водителей
    public function countRatePrice($km, $hour)
    {

        # цена за 1 километр пути
        $priceForOneKilometer = 0;

        # цена за 1 минуту пути
        $priceForOneMinute = 200;

        # цена за кол-во минут пути
        $resultPriceForMinutes = ($priceForOneMinute * $hour);

        # сообщение для вывода на экран
        $massage = "$km км * $priceForOneKilometer руб/км + $hour час(ов) * $priceForOneMinute руб/час";

        # результатирующий массив
        $resultArray['resultPriceForMinutes'] = $resultPriceForMinutes;
        $resultArray['massage'] = $massage;
        $resultArray['rate'] = "Тариф почасовой ($km км $hour час(ов))";
        return $resultArray;
    }
}