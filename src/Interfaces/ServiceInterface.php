<?php

namespace src\Interfaces;

# интерфейс дополнительной услуги содерж. метод расчета стоимости доп услуг
interface ServiceInterface
{
    # метод расчета стоимости дополнительой услуги
    # метод принимает 1 параметр:

    public function countServicePrice($value);
}