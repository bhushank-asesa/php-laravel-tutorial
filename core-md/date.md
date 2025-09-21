# Date

## Syntax

```php
date(format, timestamp)
```

## Format

|                   | Description                                             |
| ----------------- | ------------------------------------------------------- |
| Y                 | four digit representation of a year                     |
| y                 | two digit representation of a year                      |
| a                 | Lowercase am or pm                                      |
| A                 | Uppercase AM or PM                                      |
| F                 | full textual representation of a month (January...)     |
| m                 | numeric representation of a month (from 01 to 12)       |
| M                 | short textual representation of a month (three letters) |
| d                 | The day of the month (from 01 to 31)                    |
| l (lowercase 'L') | full textual representation of a day                    |
| D                 | textual representation of a day (three letters)         |
| h                 | 12-hour format of an hour (01 to 12)                    |
| H                 | 24-hour format of an hour (00 to 23)                    |
| i                 | Minutes with leading zeros (00 to 59)                   |
| s                 | Seconds, with leading zeros (00 to 59)                  |

## strtotime

- parses an English textual datetime into a Unix timestamp (the number of seconds since January 1 1970 00:00:00 GMT).

```php
echo(strtotime("now") . "<br>");
echo(strtotime("3 October 2005") . "<br>");
echo(strtotime("+5 hours") . "<br>");
echo(strtotime("+1 week") . "<br>");
echo(strtotime("+1 week 3 days 7 hours 5 seconds") . "<br>");
echo(strtotime("next Monday") . "<br>");
echo(strtotime("last Sunday"));
```

```bash
1589972726
1128297600
1589990726
1590577526
1590861931
1590364800
1589673600
```

