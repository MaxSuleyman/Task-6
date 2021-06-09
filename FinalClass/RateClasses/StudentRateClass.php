<?php

namespace FinalClass\RateClasses;

use src\AbstractClass\RateAbstractClass;
require_once DOCUMENT_ROOT . '/src/AbstractClass/RateAbstractClass.php';

class StudentRateClass extends RateAbstractClass
{
    # метод расчета стоимости дополнительой услуги
    # метод принимает 2 параметра:
    # 1)кол-во часов для услуги PGS
    # 2) кол-во дополнительных водителей
    public function countRatePrice($km, $hour)
    {
        # цена за 1 километр пути
        $priceForOneKilometer = 4;

        # цена за 1 минуту пути
        $priceForOneMinute = 1;

        # цена за кол-во километров
        $resultPriceForKilometer = $priceForOneKilometer * $km;

        # цена за кол-во минут пути
        $resultPriceForMinutes = $priceForOneMinute * $hour;

        # сообщение для вывода на экран
        $massage = "$km км * $priceForOneKilometer руб/км + $hour минут * $priceForOneMinute руб/мин";

        # результатирующий массив
        $resultArray['resultPriceForKilometer'] = $resultPriceForKilometer;
        $resultArray['resultPriceForMinutes'] = $resultPriceForMinutes;
        $resultArray['massage'] = $massage;
        $resultArray['rate'] = "Тариф студенческий ($km км, $hour минут(ы))";
        return $resultArray;
    }
}