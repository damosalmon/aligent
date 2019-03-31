# DateDifference
PHP class to get the difference between 2 dates in a variety of formats

### Requirements
PHP 7.\*
Composer (for installing phpunit for running tests)

### Usage
```php
$date1 = new DateTime('2018-01-01 00:00:00');
$date2 = new DateTime('2019-02-05 00:00:00');

/**
 * DateDifference(DateTime $start, DateTime $end)
 */
$difference = new DateDifference($date1, $date2);

/**
 * DateDifference::to(string $type)
 * @argument string  $type - ('SECONDS', 'MINUTES', 'HOURS', 'DAYS', 'WEEKS', 'MONTHS', 'YEARS')
 */
$years = $difference->to(DateDifference::YEARS);

/**
 * DateDifference::countDays(string[] $days, string $as);
 * @argument string[] $days - ('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')
 * @argument string $as - optional ('SECONDS', 'MINUTES', 'HOURS', 'DAYS', 'WEEKS', 'MONTHS', 'YEARS')
 */
$weekdays = $difference->countDays(DateDifference::WEEKDAYS, DateDifference::DAYS);
```

### Testing
Running tests
```
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/DateDifferenceTest.php
```
