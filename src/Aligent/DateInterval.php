<?php
namespace Aligent;

use DateTime;
use Exception;

class DateInterval
{
    const SECONDS = 'SECONDS';
    const MINUTES = 'MINUTES';
    const HOURS = 'HOURS';

    const DAYS = 'DAYS';
    const WEEKS = 'WEEKS';
    const MONTHS = 'MONTHS';
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
     * @var DateTimeInterface
     */
    private $start;

    /**
     * @var DateTimeInterface
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
        case self::SECONDS:
            return ($diff->h*3600) + ($diff->i * 60) + $diff->s + ($diff->days * 86400);
        case self::MINUTES:
            return ($diff->h*60) + $diff->i + ($diff->days * 1440);
        case self::HOURS:
            return $diff->h + ($diff->days * 24);
        case self::WEEKS:
            return floor($diff->days/7);
        case self::DAYS:
            return $diff->days;
        case self::YEARS:
            return $diff->y;
        case self::MONTHS:
            return ($diff->y*12) + $diff->m;
        default:
            throw new Exception('Invalid type');
            break;
        }
    }

    public function countDays(array $days, string $as = self::DAYS) : int
    {
        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod(
            ($this->start > $this->end) ? $this->end : $this->start,
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

        $sumAsDays = array_sum(array_filter($dayCount, function ($val) use ($days) {
            return in_array($val, $days);
        }, ARRAY_FILTER_USE_KEY));

        switch ($as) {
            case self::WEEKS:
                return floor($sumAsDays/7);
            case self::YEARS:
                return floor($sumAsDays/365);
            case self::MONTHS:
                return floor($sumAsDays/30);
            case self::HOURS:
                return $sumAsDays*24;
            case self::MINUTES:
                return $sumAsDays*1440;
            case self::SECONDS:
                return $sumAsDays*86400;
            default:
                return $sumAsDays;
        }
    }
}
