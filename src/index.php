<?php

require('./src/Aligent/DateInterval.php');

use Aligent\DateInterval;

$date = new DateTime();
$date2 = new DateTime('2018-01-29');

$interval = new DateInterval($date, $date2);
$diff = $date->diff($date2);

$totalFullWeeks = floor($diff->days/7);

echo $totalFullWeeks . PHP_EOL;

echo $interval->to(DateInterval::WEEKS) . PHP_EOL;

echo $interval->to(DateInterval::DAYS) . PHP_EOL;
echo $interval->to(DateInterval::YEARS) . PHP_EOL;
echo $interval->to(DateInterval::MONTHS) . PHP_EOL;

echo $interval->countDays(DateInterval::WEEKDAYS) . PHP_EOL;

echo $interval->countDays(DateInterval::WEEKENDS) . PHP_EOL;

echo $interval->countDays([DateInterval::MONDAYS, DateInterval::WEDNESDAYS]) . PHP_EOL;

echo $interval->countDays([DateInterval::MONDAYS]) . PHP_EOL;
