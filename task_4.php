<?php

/*
 * 4.	Есть таблица с колонками a и b, обе колонки типа INT. Дан запрос "select a, count(*) from t group by a". Как изменить этот запрос, чтобы вывелись уникальные значения “a” которые встречаются в таблице более 2х раз?
 */

// SELECT a, COUNT(*) FROM `test_int` GROUP BY a HAVING COUNT(a) > 2;