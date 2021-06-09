<?php

# подключение автозагрузчика composer
require_once DOCUMENT_ROOT . '/vendor/autoload.php';

# пространство имен классов тарифов
use FinalClass\RateClasses\BaseRateClass;
use FinalClass\RateClasses\ForHourRateClass;
use FinalClass\RateClasses\StudentRateClass;

# пространство имен классов доп. услуг
use FinalClass\ServiceClasses\DriverServiceClass;
use FinalClass\ServiceClasses\GPSServiceClass;


# класс обработчик данных полученных из формы
class Handler
{
    # объект вызываемого тарифа
    private $rate;

    # сумма по тарифу и сообщение
    private $rateCount;



    # объект вызываемой доп услуги
    private $gps;

    # сумма доп услугт
    private $summGps;



    # объект вызываемой доп услуги
    private $driver;

    # сумма вызываемой доп. услуги
    private $summDriver;

    # массив с результатами выполнения методов расчета по тарифам и доп услуг
    private $resultArray;

    # метод для обработки поступающих значений из формы
    # после обработки создает нужные классы тарифов и до услуг и передает им значения для расчета
    public function handlerForm($arr)
    {
        $km = $arr['kilometers'];
        $hour = $arr['time'];

        # проверка выбранного тарифа
        switch ($arr['select_rate']) {
            # если выбран базовый тариф
            case 'base_rate':
                $this->rate = new BaseRateClass();
                $this->rateCount = $this->rate->countRatePrice($km, $hour);
                $this->resultArray['rateCount'] = $this->rateCount;
                break;

            # если выбран почасовой тариф
            case 'forHour_rate':
                $this->rate = new ForHourRateClass();
                $this->rateCount = $this->rate->countRatePrice($km, $hour);
                $this->resultArray['rateCount'] = $this->rateCount;
                break;

            # если выбран студенческий тариф
            case 'student_rate':
                $this->rate = new StudentRateClass();
                $this->rateCount = $this->rate->countRatePrice($km, $hour);
                $this->resultArray['rateCount'] = $this->rateCount;
                break;
        }

        # проверка добавления дополнительных услуг
        foreach ($arr['service'] as $i) {
            switch ($i) {
                case 'gps':
                    $gpsTime = $arr['gps_time'];
                    $this->gps = new GPSServiceClass();
                    $this->summGps = $this->gps->countServicePrice($gpsTime);
                    $this->resultArray['summGps'] = $this->summGps;
                case 'newDriver':
                    $driverCount = $arr['count_driver'];
                    $this->driver = new DriverServiceClass();
                    $this->summDriver = $this->driver->countServicePrice($driverCount);
                    $this->resultArray['summDriver'] = $this->summDriver;
            }
        }

        # расчет суммы выбранных услуг
        $allSumm = $this->calcAllSumm();

        $this->resultArray['allSummCount'] = $allSumm;
        return $this->resultArray;
    }

    # метод вывода сообщения и результата расчета на экран
    public function printResult()
    {
        $massage = $this->resultArray['rateCount']['rate'] . "<br>";
        $massage .= $this->resultArray['rateCount']['massage'];

        if ( isset($this->resultArray['summGps']) ) {
            $massage .= " +" . $this->resultArray['summGps']['massage'];
        }

        if ( isset($this->resultArray['summDriver'])) {
            $massage .= " + " . $this->resultArray['summDriver']['massage'];
        }

        $massage .= " = " . $this->resultArray['allSummCount'];

        if ($this->resultArray['allSummCount'] == 0) {
            echo "Заполните форму";
            return;
        }

        return $massage;
    }

    # метод подсчета общейс стоимости услуг
    public function calcAllSumm()
    {
        $allSumm = $this->rateCount['resultPriceForKilometer'] + $this->rateCount['resultPriceForMinutes'] +
            $this->summGps['resultPrice'] + $this->summDriver['resultPrice'];

        return $allSumm;
    }
}