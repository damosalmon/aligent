<?php
namespace Aligent;

use DateTime;

class DateInterval
{
    const DAYS = 'DAYS';
    const MONTHS = 'MONTHS';
    const WEEKS = 'WEEKS';
    const YEARS = 'YEARS';

    const MONDAYS = 'Monday';
    const TUESDAYS = 'Tuesday';
    const WEDNESDAYS = 'Wednesday';
    const THURSDAYS = 'Thursday';
    const FRIDAYS = 'Friday';
    const SATURDAYS = 'Saturday';
    const SUNDAYS = 'Sunday';
    const WEEKDAYS = [self::MONDAYS, self::TUESDAYS, self::WEDNESDAYS, self::THURSDAYS, self::FRIDAYS];
    const WEEKENDS = [self::SATURDAYS, self::SUNDAYS];

    /**
     * @var DateTime
     */
    private $start;

    /**
     * @var DateTime
     */
    private $end;

    public function __construct(\DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function to(string $type) : int
    {
        $diff = $this->start->diff($this->end);

        switch ($type) {
        case self::WEEKS:
            return floor($diff->days/7);
        case self::DAYS:
            return $diff->days;
        case self::YEARS:
            return $diff->y;
        case self::MONTHS:
            return ($diff->y*12) + $diff->m;
        default: return 0;
        }
    }

    public function countDays(array $days) : int
    {
        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod(
            ($this->start > $this->end)? $this->end : $this->start,
            $interval,
            ($this->start > $this->end) ? $this->start : $this->end
        );

        $dayCount = [
            self::MONDAYS => 0,
            self::TUESDAYS => 0,
            self::WEDNESDAYS => 0,
            self::THURSDAYS => 0,
            self::FRIDAYS => 0,
            self::SATURDAYS => 0,
            self::SUNDAYS => 0,
        ];

        foreach ($daterange as $date) {
            ++$dayCount[$date->format('l')];
        }

        return array_sum(array_filter($dayCount, function ($val) use ($days) {
            return in_array($val, $days);
        }, ARRAY_FILTER_USE_KEY));
    }
}
