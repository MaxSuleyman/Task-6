<?php
# подключение абстрактного класса доп. услуг

namespace FinalClass\ServiceClasses;

use src\AbstractClass\ServiceAbstractClass;

require_once DOCUMENT_ROOT . '/src/AbstractClass/ServiceAbstractClass.php';
# класс расчета стоимости услуги GPS
class GPSServiceClass extends ServiceAbstractClass
{
    private $hour;
    # метод расчета стоимости услуги GPS
    # принимает 1 параметр: кол-во часов
    public function countServicePrice($value)
    {
        $this->hour = $value;
        # стоимость одного часа поездки с данной услугой
        $priceForHour = 15;

        # итоговая сумма услуги
        settype($this->hour, 'integer');
        if ($this->hour == 0 or $this->hour == '') {
            return;
        }

        if ($this->hour < 60) {
            $this->hour = 60;
        }

        if ($this->hour >= 60) {
            $this->hour = $this->hour / 60;
        }
        $resultPrice = $priceForHour * $this->hour;

        # сообщение для вывод стоимости
        $massage = " $priceForHour руб/час * $this->hour час(ов)";

        # масси содержащий результат выполнения функции
        $resultArray['resultPrice'] = $resultPrice;
        $resultArray['massage'] = $massage;

        # передается в класс тарифа при вызове соотв. метода
        return $resultArray;
    }
}