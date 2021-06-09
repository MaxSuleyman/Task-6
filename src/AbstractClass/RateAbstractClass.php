<?php


namespace src\AbstractClass;

use src\Interfaces\RateInterface;
require_once DOCUMENT_ROOT . '/src/Interfaces/RateInterface.php';

# абстрактный класс тарифа
abstract class RateAbstractClass implements RateInterface
{
    # метод расчета стоимости дополнительой услуги
    # метод принимает 2 параметра:
    # 1)кол-во часов для услуги PGS
    # 2) кол-во дополнительных водителей
    abstract public function countRatePrice($km, $hour);
}