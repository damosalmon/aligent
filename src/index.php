<?php

require('./src/Aligent/DateInterval.php');

use Aligent\DateInterval;

$date = new DateTime('2018-01-21 00:00:00');
$date2 = new DateTime('2018-01-29 00:00:00', new DateTimeZone('America/Denver'));

$interval = new DateInterval($date, $date2);

echo 'Hours: ' . $interval->to(DateInterval::HOURS) . PHP_EOL;
echo 'Minutes: ' . $interval->to(DateInterval::MINUTES) . PHP_EOL;
echo 'Seconds: ' . $interval->to(DateInterval::SECONDS) . PHP_EOL;

echo 'Weeks:' . $interval->to(DateInterval::WEEKS) . PHP_EOL;

echo 'Days: ' . $interval->to(DateInterval::DAYS) . PHP_EOL;
echo 'Years: ' . $interval->to(DateInterval::YEARS) . PHP_EOL;
echo 'Months: ' .$interval->to(DateInterval::MONTHS) . PHP_EOL;

echo 'Week Days: ' . $interval->countDays(DateInterval::WEEKDAYS) . PHP_EOL;

echo 'Weekends: ' . $interval->countDays(DateInterval::WEEKENDS) . PHP_EOL;

echo 'Mondays and Wednesdays:' . $interval->countDays([DateInterval::MONDAYS, DateInterval::WEDNESDAYS]) . PHP_EOL;

echo 'Mondays: ' . $interval->countDays([DateInterval::MONDAYS]) . PHP_EOL;
