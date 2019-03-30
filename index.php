<?php

$date = new DateTime();
$date2 = new DateTime('2019-01-29');

$diff = $date->diff($date2);

$totalFullWeeks = floor($diff->days/7);


echo $totalFullWeeks;
