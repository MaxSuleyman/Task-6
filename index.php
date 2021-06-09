<?php
# константа дирректрории
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Аренда</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <center>
        <h2>Расчет стоимости тарифа</h2>

        <div id="space"></div>

        <div id="container_rate">
            <form action="index.php" method="post">
                <div>
                    <p>Выберите тариф</p>
                    <input type="radio" name="select_rate" value="base_rate" id="input">Тариф базовый<br>
                    <input type="radio" name="select_rate" value="forHour_rate" id="input">Тариф почасовой<br>
                    <input type="radio" name="select_rate" value="student_rate" id="input">Тариф студенческий<br>
                </div>
                <hr>
                <div id="space"></div>

                <div>
                    <p>Укажите кол-во километров и время</p>
                    Кол-во км <input type="text" name="kilometers"><br>
                    Кол-во часов <input type="text" name="time"><br>
                </div>

                <hr>
                <div id="space"></div>

                <div>
                    <p>Дополнительные услуги</p>

                    <input type="checkbox" name="service[]" value="gps">GPS в салон<br>
                    Кол-во минут <input type="text" name="gps_time"><br>

                    <div id="space"></div><br>

                    <input type="checkbox" name="service[]" value="newDriver">Дополнительный водитель<br>
                    Кол-во дополнительных водителей <input type="text" name="count_driver"><br>
                </div>

                <div id="space"></div>

                <div>
                    <button name="submit">Принять</button>
                </div>
                <hr>
                <div id="space"></div>

            </form>
        </div>

        <div id="space"></div>

        <div id="container_result">
            <p>Расчет стоимости:</p>
            <div>
                <?php

                # подключение класса обработчика формы
                require_once DOCUMENT_ROOT . '/FinalClass/Handler.php';

                if (isset($_POST['submit'])) {
                    # выбранный тариф
                    $arr = $_POST;

                    # создание объекта класса обработчика
                    $handler = new Handler();

                    # вызов метода обработчика данных из формы
                    $handler->handlerForm($arr);

                    # вызов метода выводящего сообщение и результат расчета на экран
                    echo $handler->printResult();
                }
                ?>
            </div>
        </div>

    </center>
</body>
</html>