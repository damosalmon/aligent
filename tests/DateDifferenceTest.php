<?php

require('./src/Aligent/DateDifference.php');

use Aligent\DateDifference;
use PHPUnit\Framework\TestCase;

final class DateDifferenceTest extends TestCase
{
    public function testCanItGetWeekdaysBetweenAsHours() : void
    {
        $date1 = new DateTime('2019-05-01 00:00:00');
        $date2 = new DateTime('2019-05-09 23:59:59');

        $difference = new DateDifference($date1, $date2);

        $this->assertEquals(
            $difference->countDays(DateDifference::WEEKDAYS, DateDifference::HOURS),
            168
        );
    }
    public function testCanItGetSundaysBetween() : void
    {
        $date1 = new DateTime('2019-05-01 00:00:00');
        $date2 = new DateTime('2019-05-15 23:59:59');

        $difference = new DateDifference($date1, $date2);

        $this->assertEquals(
            $difference->countDays([DateDifference::SUNDAYS]),
            2
        );
    }
    public function testCanItGetWeekdaysBetween() : void
    {
        $date1 = new DateTime('2019-05-01 00:00:00');
        $date2 = new DateTime('2019-05-09 23:59:59');

        $difference = new DateDifference($date1, $date2);

        $this->assertEquals(
            $difference->countDays(DateDifference::WEEKDAYS),
            7
        );
    }

    public function testCanItGetSecondsBetween() : void
    {
        $date1 = new DateTime('2019-01-05 01:01:14');
        $date2 = new DateTime('2019-01-05 01:00:00');

        $difference = new DateDifference($date1, $date2);

        $this->assertEquals(
            $difference->to(DateDifference::SECONDS),
            74
        );
    }

    public function testCanItGetMinutesBetween() : void
    {
        $date1 = new DateTime('2019-01-05 02:32:00');
        $date2 = new DateTime('2019-01-05 01:00:00');

        $difference = new DateDifference($date1, $date2);

        $this->assertEquals(
            $difference->to(DateDifference::MINUTES),
            92
        );
    }

    public function testCanItGetHoursBetween() : void
    {
        $date1 = new DateTime('2019-01-05 04:59:00');
        $date2 = new DateTime('2019-01-05 01:00:00');

        $difference = new DateDifference($date1, $date2);

        $this->assertEquals(
            $difference->to(DateDifference::HOURS),
            3
        );
    }

    public function testCanItGetDaysBetween() : void
    {
        $date1 = new DateTime('2019-01-05 00:00:00');
        $date2 = new DateTime('2019-02-28 00:00:00');

        $difference = new DateDifference($date1, $date2);

        $this->assertEquals(
            $difference->to(DateDifference::DAYS),
            54
        );
    }

    public function testCanItGetWeeksBetween() : void
    {
        $date1 = new DateTime('2018-01-05 00:00:00');
        $date2 = new DateTime('2018-01-29 00:00:00');

        $difference = new DateDifference($date1, $date2);

        $this->assertEquals(
            $difference->to(DateDifference::WEEKS),
            3
        );
    }

    public function testCanItGetMonthsBetween() : void
    {
        $date1 = new DateTime('2018-05-02 00:00:00');
        $date2 = new DateTime('2018-09-01 00:00:00');

        $difference = new DateDifference($date1, $date2);

        $this->assertEquals(
            $difference->to(DateDifference::MONTHS),
            3
        );
    }

    public function testCanItGetYearsBetween() : void
    {
        $date1 = new DateTime('2018-01-05 00:00:00');
        $date2 = new DateTime('2020-01-29 00:00:00');

        $difference = new DateDifference($date1, $date2);

        $this->assertEquals(
            $difference->to(DateDifference::YEARS),
            2
        );
    }

    public function testCanItUseDifferenceTimezones() : void
    {
        $date1 = new DateTime('2018-01-01 00:00:00', new DateTimeZone('America/Denver'));
        $date2 = new DateTime('2018-01-01 00:00:00', new DateTimeZone('Australia/Adelaide'));

        $difference = new DateDifference($date1, $date2);

        $this->assertEquals(
            $difference->to(DateDifference::MINUTES),
            1050
        );
    }
}
