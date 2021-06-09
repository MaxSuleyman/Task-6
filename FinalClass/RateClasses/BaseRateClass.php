<?php


namespace FinalClass\RateClasses;

use src\AbstractClass\RateAbstractClass;

require_once DOCUMENT_ROOT . '/src/AbstractClass/RateAbstractClass.php';

class BaseRateClass extends RateAbstractClass
{
    # цена за 1 километр пути
    private $priceForOneKilometer = 10;

    # цена за 1 минуту пути
    private $priceForOneMinute = 3;

    # метод расчета стоимости дополнительой услуги
    # метод принимает 2 параметра:
    # 1)кол-во часов для услуги PGS
    # 2) кол-во дополнительных водителей
    public function countRatePrice($km, $hour)
    {
        # цена за кол-во километров
        $resultPriceForKilometer = $this->priceForOneKilometer * $km;

        # кол-во минут
        $minutes = $hour * 60;

        # цена за переданное кол-во минут
        $resultPriceForMinutes = $this->priceForOneMinute * $minutes;

        # сумма услуги по тарифу
        $summPrice = $resultPriceForMinutes + $resultPriceForKilometer;
        # сообщение для вывода на экран
        $massage = "$km км * $this->priceForOneKilometer руб/км + $hour час(ов) * $this->priceForOneMinute руб/мин";

        # результатирующий массив
        $resultArray = [
            'resultPriceForKilometer' => $resultPriceForKilometer,
            'resultPriceForMinutes' => $resultPriceForMinutes,
            'massage' => $massage,
            'rate' => "Тариф базовый ($km км, $hour час(ов))",
            'summPrice' => $summPrice
        ];
        return $resultArray;
    }
}