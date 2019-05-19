<?php

//Возможно ли в PHP следующее?

$datetime = new DateTime();
echo (clone $datetime)->format('Y-m-d');