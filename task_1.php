<?php

// Возможно ли такое в PHP и как это реализуется, если возможно:

class Building extends ArrayObject
{

}

$obj = new Building();
$obj['name'] = 'Name';
