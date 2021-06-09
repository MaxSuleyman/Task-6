<?php
# подключение абстрактного класса доп. услуг


namespace FinalClass\ServiceClasses;

use src\AbstractClass\ServiceAbstractClass;
require_once DOCUMENT_ROOT . '/src/AbstractClass/ServiceAbstractClass.php';

# класс расчета стоимости услуги Доп. водитель
class DriverServiceClass extends ServiceAbstractClass
{
    private $driverCount;
    # метод расчета стоимости услуги Доп. водитеь
    # принимает 1 параметр: кол-во часов
    public function countServicePrice($value)
    {
        # стоимость за 1 дополнительного водителя
        $priceForOneDriver = 100;

        # кол-во дополнительных водителей
        $this->driverCount = $value;
        if ($this->driverCount == 0 or $this->driverCount == '') {
            return;
        }
        settype($this->driverCount, 'integer');
        # итоговая сумма услуги
        $resultPrice = $priceForOneDriver * $this->driverCount;

        # сообщение для вывод стоимости
        $massage = " $priceForOneDriver руб/человека * $this->driverCount человек";

        # массив содержащий результат выполнения функции
        $resultArray['resultPrice'] = $resultPrice;
        $resultArray['massage'] = $massage;
        # передается в класс тарифа при вызове соотв. метода
        return $resultArray;
    }
}