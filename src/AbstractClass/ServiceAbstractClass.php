<?php

namespace src\AbstractClass;
use src\Interfaces\ServiceInterface;

require_once DOCUMENT_ROOT . '/src/Interfaces/ServiceInterface.php';
# абстрактный класс доп. услуги
abstract class ServiceAbstractClass implements ServiceInterface
{
    # метод расчета стоимости дополнительой услуги
    # метод принимает 1 параметр:
    abstract public function countServicePrice($value);
}