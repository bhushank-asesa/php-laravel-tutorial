# Math

## Min and Math

```php
echo min(0, 150, 30, 20, -8, -200);
echo max(0, 150, 30, 20, -8, -200);
```

```bash
-200
150
```

## Get Value

```php
echo "pi value =".pi();
echo "abs of -6.7 ".abs(-6.7);
echo "sqrt of 64 ".sqrt(64);
```

```php
pi value =3.1415926535898
abs of -6.7 6.7
sqrt of 64 8
```

## Round(value,precision)

- Rounds a float

```php
echo round(0.60);
echo round(0.49);
echo round(0.4755,2);
echo round(0.47123);
```

```bash
1
0
0.48
0
```

## ceil

- ceil — Round fractions up

```php
echo ceil(0.60);
echo ceil(0.49);
```

```bash
1
1
```

## rand

```php
echo rand(); // up-to 2010478733 max unsigned int
echo rand(10, 100);
```

```bash
1712129730
35
```
