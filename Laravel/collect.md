# Collection

## use

```php
use Illuminate\Support\Collection
```

## Code

```php
$arr = ['Bhushan', "Kalpak", null];

$arrCollection = collect($arr);

print_r($arr);
print_r($arrCollection);

$newArr = $arrCollection->map(function ($item) {
    return strtoupper($item);
})->reject(function ($item) {
    return empty($item);
});
print_r($newArr);
```

> collect helper to create a new collection instance from the array

```php
$arr = [
    [
        "a" => "a1"
    ],
    [
        "a" => "a2"
    ],
    [
        "a" => "a1"
    ]
];
$arrCollection = collect($arr);
$newArr = $arrCollection->groupBy("a");
print_r($newArr->toArray());
```

> This will group array by value of a key in array and return new array
