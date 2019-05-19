<?php

/*
 * Как проверить соответствует ли дата, хранимая в переменной $str, определенному формату? Используем описание формата такое же как в функции php date(). Пример описания формата:
 */

function validateDate($date, $format)
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

$strFormat1 = 'd.m.Y';
$strFormat2 = 'H.i';

var_dump(validateDate('12.12.2013', $strFormat1));
var_dump(validateDate('12.12', $strFormat2));