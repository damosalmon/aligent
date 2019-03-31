<?php

require('./src/Aligent/DateDifference.php');

use Aligent\DateDifference;

$date = new DateTime('2018-01-21 00:00:00');
$date2 = new DateTime('2018-01-29 00:00:00', new DateTimeZone('America/Denver'));

$interval = new DateDifference($date, $date2);

echo 'Hours: ' . $interval->to(DateDifference::HOURS) . PHP_EOL;
echo 'Minutes: ' . $interval->to(DateDifference::MINUTES) . PHP_EOL;
echo 'Seconds: ' . $interval->to(DateDifference::SECONDS) . PHP_EOL;

echo 'Weeks:' . $interval->to(DateDifference::WEEKS) . PHP_EOL;

echo 'Days: ' . $interval->to(DateDifference::DAYS) . PHP_EOL;
echo 'Years: ' . $interval->to(DateDifference::YEARS) . PHP_EOL;
echo 'Months: ' .$interval->to(DateDifference::MONTHS) . PHP_EOL;

echo 'Week Days: ' . $interval->countDays(DateDifference::WEEKDAYS) . PHP_EOL;

echo 'Weekends: ' . $interval->countDays(DateDifference::WEEKENDS) . PHP_EOL;

echo 'Mondays and Wednesdays:' . $interval->countDays([DateDifference::MONDAYS, DateDifference::WEDNESDAYS]) . PHP_EOL;

echo 'Mondays: ' . $interval->countDays([DateDifference::MONDAYS]) . PHP_EOL;
